<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>

    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }

        table tr th {
            padding-top: 20px;
        }
    </style>

</head>
<body>

<fieldset>
    <legend>Add Member</legend>

    <form action="comment_post.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Comment</th>
                <textarea rows="4" cols="50" name="comments" placeholder="Comments"></textarea>
            </tr>
            <tr>
                <td><button type="submit" >Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>

</fieldset>

</body>
</html>
