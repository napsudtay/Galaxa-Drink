<script src="jquery-lastest.js"></script>
<script>
$(document).ready(function () {
    setInterval(function() {
        $.get("summary_a.php", function (result) {
            $('#summaryid').html(result);
        });
    },500);
});
</script>
<div id="summaryid">
</div>