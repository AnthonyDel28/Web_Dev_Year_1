<div class="play-form">
    <form action="index.php?view=action/play" method="post">
        <label for="num">Je choisi mon nombre entre 0 et 5</label>
        <select name="num" id="num">
            <?php
                for($i = 1; $i <= 5; $i++){
                    print "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <input type="submit">
    </form>
</div>