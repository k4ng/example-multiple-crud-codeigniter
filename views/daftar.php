<html>
<head>
    <title>Multi CRUD by k4ng</title>    
</head>
<body>
    <h1>Multi CRUD by k4ng</h1>
    <?=form_open("multi_crud/tambah", array("method" => "GET"));?>
        <fieldset>
            <legend><b>Tambah data</b></legend>
            <p>Silahkan ubah angka pada form di bawah dengan angka yang kamu inginkan.</p>
            <label>Buat</label>
            <input type="number" name="total_form" value="1" style="width:50px;">
            <label> form</label>
            <input type="submit" name="submit" value="ok">
        </fieldset>
    <?=form_close();?>
    <?=$this->session->flashdata('notif');?>
    <fieldset>
        <legend><b>Daftar Murid</b></legend>
        <p style="color:red;font-weight:bold;">*) Centang terlebih dahulu jika ingin mengubah atau menghapus data!</p>
        <?=form_open("multi_crud/sunting_hapus");?>
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <td>#</td>
                    <td>Nama</td>
                    <td>Umur</td>
                    <td>Kelas</td>
                </tr>
                <?php
                    if($data_cout == 0)
                    {
                        echo "
                            <tr>
                                <td colspan='4' align='center' style='color:#B0BEC5;'>Tidak ada data murid!</td>
                            </tr>
                        ";
                    }
                    else
                    {
                        foreach ($data as $v) {
                            echo "
                                <tr>
                                    <td><input type='checkbox' name='check[]' value='{$v->id}'></td>
                                    <td>".$v->nama."</td>
                                    <td>".$v->umur."</td>
                                    <td>".$v->kelas."</td>
                                </tr>
                            ";
                        }
                    }
                ?>
            </table>
            <input type="submit" name="sunting" value="Sunting">
            <input type="submit" name="hapus" value="Hapus">
        <?=form_close();?>
    </fieldset>
</body>
</html>