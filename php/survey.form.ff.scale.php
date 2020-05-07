echo "<form id="freeform" action="php/survey.handle.ff.scale.survey.php" method="post" enctype="multipart/form-data">
    <div id="ff">
    <h1>Is there anything you would like to say to
    the developers of this project?</h1>
        <textarea row="10" col="60" name="ff">
    </div>

    <div id="scale">
        <h1>Finally, how many stars would you give this project?</h1>
        <input type="radio" name="scale" value="1">
        <label id="scale1"></label>
        <input type="radio" name="scale" value="2">
        <label id="scale2"></label>
        <input type="radio" name="scale" value="3">
        <label id="scale3"></label>
        <input type="radio" name="scale" value="4">
        <label id="scale4"></label>
        <input type="radio" name="scale" value="5">
        <label class="scale5"></label>
        <input type="radio" name="scale" value="6">
        <label id="scale6"></label>
        <input type="radio" name="scale" value="7">
        <label id="scale7"></label>
        <input type="radio" name="scale" value="8">
        <label id="scale8"></label>
        <input type="radio" name="scale" value="9">
        <label id="scale9"></label>
        <input type="radio" name="scale" value="10">
        <label class="scale10"></label>
    </div>

    <input type="submit" name="submit" value="submit">
</form>
";
