<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>Add post �</title>
    </head>
    <body>
        <form id="new_topic" name="new_topic" method="post" action="add_new_topic.php">
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                            <tr>
                                <td colspan="3" bgcolor="#000000"><b style="color: #FFFFFF;">Add Post�</b> </td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Topic</strong></td>
                                <td width="70%"><input name="topic" type="text" id="topic" size="50" /></td>
                            </tr>
                            <tr>
                                <td valign="top" style="text-align: right;"><strong>Detail�</strong></td>
                                <td><textarea name="detail" cols="50" rows="5" id="detail"></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: right;"><strong>Name</strong></td>
                                <td><input name="name" type="text" id="name" size="50" /></td>
                            </tr>
                            <tr>
                                <td style="text-align: right;"><strong>Email</strong></td>
                                <td><input name="email" type="text" id="email" size="50" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Post" /> 
                                    <input type="reset" name="Submit2" value="Clear" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>