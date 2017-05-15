<html>
<head>
    <title>Tambah Data ~ Multi CRUD by k4ng</title>    
</head>
<body>
    <h1>Multi CRUD by k4ng</h1>
    <?=form_open("multi_crud/tambah_proses");?>
        <fieldset>
            <legend><b>Tambah data</b></legend>
            <table cellpadding="5" cellspacing="5">
                <?php
                    for ($i=0; $i < $total_form; $i++) 
                    {
                        echo "
                            <tr>
                                <td><input type='text' name='nama[]' placeholder='nama'></td>
                                <td><input type='number' name='umur[]' placeholder='umur' style='width:60px;'></td>
                                <td><input type='number' name='kelas[]' placeholder='kelas' style='width:60px;'></td>
                            </tr>
                        ";
                    }
                ?>
            </table>
            <input type="submit" name="simpan" value="Simpan">
            <input type="reset" value="Reset">
        </fieldset>
    <?=form_close();?>
</body>
</html>