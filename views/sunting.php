<?php
    /*echo "<pre>";
    print_r($data);
    echo "</pre>";*/
?>
<html>
<head>
    <title>Sunting Data ~ Multi CRUD by k4ng</title>    
</head>
<body>
    <h1>Multi CRUD by k4ng</h1>
    <?=form_open("multi_crud/sunting_proses");?>
        <fieldset>
            <legend><b>Sunting data</b></legend>
            <table cellpadding="5" cellspacing="5">
                <?php
                    foreach ($data as $key => $v) 
                    {
                        echo "
                            <tr>
                                <td><input type='hidden' name='id[]' value='{$v->id}'></td>
                                <td><input type='text' name='nama[]' placeholder='nama' value='{$v->nama}'></td>
                                <td><input type='number' name='umur[]' placeholder='umur' value='{$v->umur}' style='width:60px;'></td>
                                <td><input type='number' name='kelas[]' placeholder='kelas' value='{$v->kelas}' style='width:60px;'></td>
                            </tr>
                        ";
                    }
                ?>
            </table>
            <input type="submit" name="sunting" value="Simpan perubahan">
            <input type="reset" value="Reset">
        </fieldset>
    <?=form_close();?>
</body>
</html>