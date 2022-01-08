<div class="row">
    <div class="col-4" style="margin-bottom: 50px">
        <h2>Adauga curs</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" class="form-control" name="nume">
            </div>
            <div class="form-group">
                <label for="data_incepere">Data incepere</label>
                <input type="date" class="form-control" name="data_incepere">
            </div>
            <div class="form-group">
                <label for="sala">Sala</label>
                <input type="number" class="form-control" name="sala">
            </div> 
            <button type="submit" class="btn btn-dark"  name="submit">Submit</button>
        </form>
    </div>
    <div class="col-8" style="margin-bottom: 50px">
        
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Curs</th>
                    <th scope="col">Data incepere</th>
                    <th scope="col">Sala</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cursDAO = new CursDAO();
                    $cursuri = $cursDAO->get();
                    foreach ($cursuri as $curs) {
                ?>
                <td><?php print $curs['nume']; ?></td>
                <td><?php print $curs['data_incepere']; ?></td>
                <td><?php print $curs['sala']; ?></td>
                <td><a href="index.php?edit=<?php print $curs['id']; ?>">Editeaza</a><br></td>
                <td><a href="index.php?delete=<?php print $curs['id']; ?>">Sterge</a><br></td>
            </tbody>
                <?php } ?>
        </table>
        
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $nume = $_POST['nume'];
    $data = $_POST['data_incepere'];
    $sala = $_POST['sala'];
    $curs = new Curs($nume, $data, $sala);
    $add = $cursDAO->add($curs);
    
    if ($add) {
        echo("<meta http-equiv='refresh' content='1'>");
    } else {
        print 'An error has occured. Try again.';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $cursDAO->delete($id);
    echo("<meta http-equiv='refresh' content='1'>");
}
?>




