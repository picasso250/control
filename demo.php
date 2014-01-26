<html>
<head>
  <title>demo of notification</title>
</head>
<body>
  <h2>post notification</h2>
  <form method="post" action="notification.php">
    <label>text</label>
    <input name="text">
    <br>
    <input type="hidden" name="__DEBUG__" value="1">
    <input type="submit" value="post">
  </form>

  <h2>get notification</h2>
  <a href="notification.php?__DEBUG__">get notification</a>

  <h2>post action</h2>
  <form method="post" action="action.php">
    <label>name</label>
    <input name="name">
    <br>
    <input type="hidden" name="__DEBUG__" value="1">
    <input type="submit" value="post">
  </form>

  <h2>get action</h2>
  <a href="action.php?__DEBUG__">get action</a>

</body>
</html>
