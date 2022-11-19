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

/**
 * Format tanggal
 */
if (!function_exists('formatTanggal')) {

    function formatTanggal($dateTimeString, $includeWaktu = false, $includeHari = true)
    {
        $DAFTAR_BULAN = [
            "Januari", "Februari", "Maret",
            "April",   "Mei",      "Juni",
            "Juli",    "Agustus",  "September",
            "Oktober", "November", "Desember"
        ];

        $DAFTAR_HARI = [
            "Senin",  "Selasa", "Rabu", "Kamis",
            "Jum'at", "Sabtu",  "Minggu"
        ];

        $dateTime = strtotime($dateTimeString);

        $tanggal = date('d', $dateTime);
        $bulan   = $DAFTAR_BULAN[date('n', $dateTime) - 1];
        $tahun   = date('Y', $dateTime);

        $stringHasil = "{$tanggal} {$bulan} {$tahun}";

        if ($includeWaktu) {
            $waktu = date('H:i:s', $dateTime);

            $stringHasil .= " pukul {$waktu}";
        }

        if ($includeHari) {
            $hari = $DAFTAR_HARI[date('N', $dateTime) - 1];

            $stringHasil = "{$hari}, {$stringHasil}";
        }

        return $stringHasil;
    }
}
