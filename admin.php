<link href="./assets/css/output.css" rel="stylesheet">
<div class="w-full h-screen bg-blue-700/50 flex justify-center items-center">
    <form action="check.php" method="post" class="t">
        <label for="Username">Username:</label>
        <input type="text" class="bg-blue-500 rounded-lg px-2 my-6" name="username">
        <br>
        <label for="Username">Password:</label>
        <input type="password" class="bg-blue-500 rounded-lg px-2" name="password">
 <br>
        <button class="btn bg-blue-600 mt-6 ml-32 px-4 text-white"  name="btn" value="clicked">Click</button>
    </form>
</div>


<script src="./assets/js/jquery-4.0.0.min.js"></script>
<script>
    $(document).ready(function () {
        console.log("salam");
    });
</script>

