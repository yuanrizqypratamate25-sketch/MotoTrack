<?php

namespace App\Http\Controllers;

use App\Models\SepedaMotor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SepedaMotorController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $motors = SepedaMotor::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama_produk', 'like', "%{$search}%")
                        ->orWhere('spesifikasi', 'like', "%{$search}%");
                });
            })
            ->orderBy('nama_produk')
            ->paginate(8)
            ->withQueryString();

        $totalJenis = SepedaMotor::count();
        $totalStok = (int) SepedaMotor::sum('jumlah_produk');
        $totalNilaiStok = (int) SepedaMotor::query()
            ->selectRaw('COALESCE(SUM(jumlah_produk * harga_produk), 0) AS total')
            ->value('total');

        return view('sepeda-motor.index', compact(
            'motors', 'search', 'totalJenis', 'totalStok', 'totalNilaiStok'
        ));
    }

    public function create(): View
    {
        return view('sepeda-motor.create', ['motor' => new SepedaMotor()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(true));
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar-motor', 'public');
        }
        SepedaMotor::create($validated);

        return redirect()
            ->route('sepeda-motor.index')
            ->with('success', 'Data sepeda motor berhasil ditambahkan.');
    }

    public function show(SepedaMotor $sepedaMotor): View
    {
        return view('sepeda-motor.show', ['motor' => $sepedaMotor]);
    }

    public function edit(SepedaMotor $sepedaMotor): View
    {
        return view('sepeda-motor.edit', ['motor' => $sepedaMotor]);
    }

    public function update(Request $request, SepedaMotor $sepedaMotor): RedirectResponse
    {
        $validated = $request->validate($this->rules(false));
        if ($request->hasFile('gambar')) {
            if ($sepedaMotor->gambar) {
                Storage::disk('public')->delete($sepedaMotor->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('gambar-motor', 'public');
        }
        $sepedaMotor->update($validated);

        return redirect()
            ->route('sepeda-motor.index')
            ->with('success', 'Data sepeda motor berhasil diperbarui.');
    }

    public function destroy(SepedaMotor $sepedaMotor): RedirectResponse
    {
        if ($sepedaMotor->gambar) {
            Storage::disk('public')->delete($sepedaMotor->gambar);
        }
        $sepedaMotor->delete();

        return redirect()
            ->route('sepeda-motor.index')
            ->with('success', 'Data sepeda motor berhasil dihapus.');
    }

    /** @return array<string, array<int, mixed>> */
    private function rules(bool $isCreate = true): array
    {
        return [
            'nama_produk' => ['required', 'string', 'max:150'],
            'spesifikasi' => ['required', 'string', 'max:5000'],
            'jumlah_produk' => ['required', 'integer', 'min:0', 'max:1000000'],
            'harga_produk' => ['required', 'integer', 'min:0', 'max:999999999999'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
