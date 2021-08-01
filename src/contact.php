<?php

// Output data
$redirect    = "http://beta.kiezenvoornepal.nl/contact.php?sent=";

// POST data
$from = $_POST["tbFrom"];
$email = $_POST["tbEmailAddress"];
$comments = $_POST["tbComments"];

// Check valid post data
if (isset($from) && isset($email) && isset($comments)) {
    // Mailer data
    $to      = 'info@kiezenvoornepal.nl';
    $from     = 'website@kiezenvoornepal.nl';

    // Message data
    $subject = 'Kiezen voor Nepal - Website formulier';
    $message = '<html>
<head>
<title>Kiezen voor Nepal - Website formulier</title>
</head>
<body>
<p>De volgens gegevens zijn op de website achtergelaten:</p>
<table>
    <tr>
    <td>Naam</td><td>' . htmlentities($from) . '</td>
    </tr>
    <tr>
    <td>Email</td><td>' . htmlentities($email) . '</td>
    </tr>
    <tr>
    <td>Vraag</td><td>' . htmlentities($comments) . '</td>
    </tr>
</table>
</body>
</html>';

    // Additional header
    $headers  = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
        'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from  . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Send the email
    $result = mail($to, $subject, $message, $headers);

    if (!$result) {
        header("location: " . $redirect . "0");
    } else {
        header("location: " . $redirect . "1");
    }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Kiezen voor Nepal - Contact</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="robots" content="Index">
    <meta name="Revisit-After" content="10 days">
    <link rel="stylesheet" href="/style/index.css" type="text/css">
    <link rel="stylesheet" href="/style/form.css" type="text/css">
    <script type="text/javascript" src="/script/FormControls.js"></script>
    <script type="text/javascript" src="/script/FormValidators.js"></script>
</head>

<body>
    <div id="container">
        <div id="menu">
            <div id="navcontainer">
                <ul id="navlist">
                    <li><a href="/index.html">Home</a></li>
                    <li><a href="/water.htm">Water</a></li>
                    <li><a href="/dental.htm">Dental</a></li>
                    <li><a href="/fotos.htm">Fotos</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="column1" style="float: left">
            <img src="Images/col2.png" alt="Kiezen voor Nepal" />
        </div>
        <div class="column2" style="float: right">
            <img src="Images/col1.png" alt="Kiezen voor Nepal" />
        </div>
        <div id="content">
            <div id="maintop">
            </div>
            <div id="maincontent">
                <h2>
                    Contact</h2>
                <h3>
                    Algemeen</h3>
                <p>

                    Heeft u na het lezen van deze website nog vragen en/of opmerkingen? Of wilt u ons project ondersteunen? Vul dan het contactformulier in en wij zullen contact met u opnemen.

                </p>

                <h3>
                    Contact formulier</h3>
                <?php

                // Get the querystring parameter
                $sentFlag = $_GET["sent"];
                if (isset($sentFlag)) {
                    if ($sentFlag) {
                        echo "<br /><p>Uw bericht is verstuurd.</p>";
                    } else {
                        echo "<br /><p>Er is een fout opgetreden.</p>";
                    }
                } else {

                ?>
                    <form name="form1" method="post" action="/contact.php" onsubmit="return FexFormValidator.FormSubmit(this)">
                        <div class="formContainer">
                            <div>
                                <fieldset>
                                    <div class="formrow even">
                                        <div class="label">
                                            Naam:</div>
                                        <input name="tbFrom" type="text" id="tbFrom" />
                                        <div class="validator valid" validatorfor="tbFrom" validator="required">
                                            <span title="Dit is een verplicht veld">
                                                <img src="images/error.png" alt="Dit is een verplicht veld" />
                                        </div>
                                    </div>
                                    <br />
                                    <div class="formrow odd">
                                        <div class="label">
                                            E-mail adres:</div>
                                        <input name="tbEmailAddress" type="text" id="tbEmailAddress" />
                                        <div class="validator valid" validatorfor="tbEmailAddress" validator="regExp" validationexpression="^(([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?))$">
                                            <span title="E-mail adres is onjuist (e.g.: info@kiezenvoornepal.nl)">
                                                <img src="images/error.png" alt="Dit is een verplicht veld" />
                                            </span>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="formrow even high">
                                        <div class="label">
                                            Vraag/ Opmerking (<span id="commentsCharsLeft">500</span>):</div>
                                        <textarea name="tbComments" rows="2" cols="20" id="tbComments" onkeyup="FexFormControls.Comments_OnkeyUp();"></textarea>
                                        <div class="validator valid" validatorfor="tbComments" validator="required" style="vertical-align:top">
                                            <span title="Dit is een verplicht veld">
                                                <img src="images/error.png" alt="Dit is een verplicht veld" />
                                        </div>
                                    </div>

                                    <div class="buttons">
                                        <button type="submit">
                                            Versturen</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

                <br />


            </div>
            <div id="mainbot">
            </div>
            <div id="footer">
                Copyright GUP2011</div>
        </div>
    </div>
</body>

</html>