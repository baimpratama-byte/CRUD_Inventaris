<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris Barang</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 24px; color: #111; }
        h2 { margin: 0 0 4px; }
        .meta { color: #555; margin-bottom: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 5px 8px; text-align: left; }
        th { background: #eee; }
        .r { text-align: right; }
        .noprint { margin-bottom: 14px; }
        @media print { .noprint { display: none; } }
    </style>
</head>
<body>
<div class="noprint">
    <button onclick="window.print()">Cetak / Simpan sebagai PDF</button>
    <small>&mdash; pada dialog cetak pilih "Save as PDF".</small>
</div>
<h2>Laporan Inventaris Barang</h2>
<div class="meta">
    Dicetak: <?= date('d/m/Y H:i') ?><?= $search !== '' ? ' &middot; Pencarian: "' . e($search) . '"' : '' ?>
    &middot; Total: <?= count($items) ?> barang
</div>
<table>
    <thead>
    <tr><th>No</th><th>ID</th><th>Nama Barang</th><th>Kategori</th><th class="r">Stok</th><th class="r">Harga</th><th>Tanggal Masuk</th></tr>
    </thead>
    <tbody>
    <?php foreach ($items as $n => $it): ?>
        <tr>
            <td><?= $n + 1 ?></td>
            <td><?= (int) $it['id'] ?></td>
            <td><?= e($it['name']) ?></td>
            <td><?= e($it['category_name']) ?></td>
            <td class="r"><?= (int) $it['stock'] ?></td>
            <td class="r"><?= rupiah($it['price']) ?></td>
            <td><?= tanggal($it['entry_date']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>window.addEventListener('load', function () { setTimeout(function () { window.print(); }, 400); });</script>
</body>
</html>
