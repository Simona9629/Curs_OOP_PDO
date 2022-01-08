<?php
$cursDAO = new CursDAO;
$curs = $cursDAO->getDupaId($_GET['edit']);
?>
<div class="row">
    <div class="col-8" style="margin-bottom: 50px">
        <h2>Editeaza curs</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" class="form-control" name="nume" value="<?php print $curs['nume']; ?>">
            </div>
            <div class="form-group">
                <label for="data_incepere">Data incepere</label>
                <input type="date" class="form-control" name="data_incepere" value="<?php print $curs['data_incepere']; ?>">
            </div>
            <div class="form-group">
                <label for="sala">Sala</label>
                <input type="number" class="form-control" name="sala" value="<?php print $curs['sala']; ?>">
            </div> 
            <button type="submit" class="btn btn-dark"  name="edit">Edit</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>
<?php
if (isset($_POST['edit'])) {
    $nume = $_POST['nume'];
    $data = $_POST['data_incepere'];
    $sala = $_POST['sala'];
    $curs = new Curs($nume, $data, $sala);
    $id = $_GET['edit'];
    $curs->setId($id);
    $upd = $cursDAO->update($curs);
    
    if ($upd) {
        header('location: index.php');
    } else {
        print 'An error has occured. Try again.';
    }
}
?>





