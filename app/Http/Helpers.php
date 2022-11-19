<?php

/**
 * Buat link ke halaman detail dokumen untuk akses publik
 */
if (!function_exists('linkPublikDokumen')) {

    function linkPublikDokumen($id, $judul, $tipe)
    {
        switch ($tipe) {
            case "Perdes":
                $link = route('perdes', ["id" => $id, "title" => formatJudul($judul)]);
                break;
            case "Perkades":
                $link = route('perkades', ["id" => $id, "title" => formatJudul($judul)]);
                break;
            case "Permakades":
                $link = route('permakades', ["id" => $id, "title" => formatJudul($judul)]);
                break;
            case "SK Kades":
                $link = route('keputusan', ["id" => $id, "title" => formatJudul($judul)]);
                break;
            case "Lain":
                $link = route('lain-lain', ["id" => $id, "title" => formatJudul($judul)]);
                break;
        }

        return $link;
    }
}

/**
 * Konversi judul dalam format URL SEO friendly
 */
if (!function_exists('formatJudul')) {

    function formatJudul($judul)
    {
        // Bersihkan white-space di depan dan belakang
        $judul = trim($judul);

        // Kecilkan semua huruf
        $judul = strtolower($judul);

        // Hilangkan semua karakter simbol
        $judul = preg_replace('/[^\p{L}\p{N}\s]/u', '', $judul);

        // Ganti double-white-space atau lebih menjadi notasi strip
        $judul = preg_replace('(\s+)', '-', $judul);

        return $judul;
    }
}
