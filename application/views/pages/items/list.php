<table class="table">
    <thead>
        <tr>
            <td>Gambar</td>
            <td>Nama Barang</td>
            <td>Harga Barang</td>
            <td>Deskripsi Barang</td>
            <td>Banyak Barang</td>
            <td>Berat Barang</td>
            <td>Tipe Barang</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($listItemArray)){

            foreach ($listItemArray as $value) {
        ?>
        <tr>
            <td><?php echo $value->images; ?></td>
            <td><?php echo $value->name; ?></td>
            <td><?php echo $value->price; ?></td>
            <td><?php echo $value->description; ?></td>
            <td><?php echo $value->item_quantity; ?></td>
            <td><?php echo $value->weight; ?></td>
            <td><?php echo $value->type; ?></td>
            <td><?php echo $value->category; ?></td>
            <td>
                <a href=<?php echo base_url("welcome/edit/".$value->id."")?> class="btn btn-primary">Edit</a>
                <a href="/delete/<?php echo $value->id; ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
            }
        }else{
        ?>
        <tr>
            <td>Tidak ada data.</td>
        </tr>
        <?php  
        }
        ?>
    </tbody>
</table>