<html>

<head>
    <title>

        Itax Payment || Home

    </title>
    <link rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://portal.host.iveri.com/scripts/bootstrap/css/bootstrap.min.css" />
    <script src="https://portal.host.iveri.com/scripts/jquery/js/jquery.min.js"></script>
    <script src="https://portal.host.iveri.com/scripts/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://portal.host.iveri.com/scripts/jquery/js/jquery.litebox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        liteboxInitialise('https://portal.host.iveri.com/scripts/jquery/js/jquery.litebox.js');

        function liteboxComplete(data) {
            console.log(data);
            axios.post('https://portal.host.iveri.com/Lite/Result.asp', data);
        }

        // Create form post
        // function post(path, data, method) {
        //     method = method || "post"; // Set method to post by default if not specified.

        //     // The rest of this code assumes you are not using a library.
        //     // It can be made less wordy if you use one.
        //     var form = document.createElement("form");
        //     form.setAttribute("method", method);
        //     form.setAttribute("action", path);

        //     var jsonData = JSON.parse(data);
        //     Object.keys(jsonData).forEach(function(key) {
        //         var hiddenField = document.createElement("input");
        //         hiddenField.setAttribute("type", "hidden");
        //         hiddenField.setAttribute("name", key);
        //         hiddenField.setAttribute("value", jsonData[key]);
        //         form.appendChild(hiddenField);
        //     })
        //     document.body.appendChild(form);
        //     form.submit();
        // }
    </script>


</head>

<body>

    <center>
        <div class="container">

            <br>
            <br>


            <div id="iveri-litebox">

            </div>

            <form name="Form1" method="post" action="https://portal.host.iveri.com/Lite/Authorise.aspx"
                id="Form1">
                <?php echo csrf_field(); ?>
                <table class="clsQuery" cellspacing="0" align="center" border="0">
                    <tr>
                        <td class="clsInformation" align="center" colspan="3">
                            <b>Confirm Details</b>
                        </td>
                    </tr>
                    <tr>
                        <td class="clsQueryHeading" align="left">
                            Name:
                        </td>
                        <td class="clsQuery" align="left" style="border-top: 1px solid black;" colspan="0">
                            <input type="text" value="Mr." name="Ecom_BillTo_Postal_Name_Prefix"
                                style="width: 30px;" id="Ecom_BillTo_Postal_Name_Prefix" class="clsInputReadOnlyText" />
                            <input name="Ecom_BillTo_Postal_Name_First" type="text" value="Romano"
                                style="width: 100px;" id="Ecom_BillTo_Postal_Name_First" class="clsInputReadOnlyText" />

                        </td>
                    </tr>

                    <tr>
                        <td class="clsQueryHeading" align="left">
                            Email:
                        </td>
                        <td class="clsQuery" align="left" colspan="2">
                            <input name="Ecom_BillTo_Online_Email" readonly="readonly" type="text"
                                value="jdoe@mail.com" maxlength="50" id="Ecom_BillTo_Online_Email"
                                class="clsInputReadOnlyText" />

                        </td>
                    </tr>
                    <tr>
                        <td class="clsQueryHeading" align="left">

                            Merchant Reference:
                        </td>
                        <td class="clsQuery" align="left" style="border-bottom: 1px solid black;" colspan="2">
                            <input name="Ecom_ConsumerOrderID" readonly="readonly" type="text" value="AUTOGENERATE"
                                maxlength="20" id="Ecom_ConsumerOrderID" class="clsInputReadOnlyText" />
                            <input type="hidden" name="Ecom_SchemaVersion" id="Ecom_SchemaVersion" />
                            <input type="hidden" name="Ecom_TransactionComplete" id="Ecom_TransactionComplete"
                                value="false" />

                            <input type="hidden" name="Lite_Authorisation" id="Lite_Authorisation" value="false" />
                            <input type="hidden" name="Lite_Version" id="Lite_Version" value="2.0" />
                            <!-- Ecml end-->
                        </td>
                    </tr>
                    <tr>
                        <td class="clsInformation" colspan="3" style="padding: 5px;" align="center"><b>Line Items</b>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" readonly="readonly" class="clsInputReadOnlyText"
                                name="Lite_Order_LineItems_Product_1" id="Lite_Order_LineItems_Product_1"
                                value="Example Product#1" /></td>
                        <td><input type="text" readonly="readonly" class="clsInputReadOnlyText"
                                name="Lite_Order_LineItems_Quantity_1" id="Lite_Order_LineItems_Quantity_1"
                                value="1" /></td>
                        <td><input type="text" readonly="readonly" class="clsInputReadOnlyText"
                                name="Transaction_LineItems_Amount_1" id="Transaction_LineItems_Amount_1"
                                value="10.00" /></td>
                        <input type="hidden" name="Lite_Order_LineItems_Amount_1" id="Lite_Order_LineItems_Amount_1"
                            value="10.00" />
                    </tr>
                    <tr>
                        <td class="clsQueryHeading" align="left">
                            Total Order Amount:
                        </td>

                        <td class="clsQuery" align="left" style="border: 1px solid black;" colspan="2">
                            <input name="Transaction_Amount" id="Transaction_Amount" type="text" value="10.00"
                                onblur="javascript: updateForm();" onchange="javascript: updateForm();"
                                maxlength="10" style="width: 75px;" class="clsInputText" />
                            <input type="text" name="Lite_Order_Amount" id="Lite_Order_Amount" />
                        </td>
                    </tr>
                    <tr>
                        <td class="clsQueryHeading" align="left">
                            Application Id:
                        </td>
                        <td class="clsQuery" align="left" style="border: 1px solid black;" colspan="2">
                            <input name="Merchant_ApplicationID" type="text"
                                value="{91D8E818-9FC9-4080-8A40-2B50858E7881}" maxlength="40"
                                id="Merchant_ApplicationID" onblur="javascript: updateForm();"
                                onchange="javascript: updateForm();" style="width: 230px;" class="clsInputText" />
                            <input type="hidden" name="Lite_Merchant_ApplicationID"
                                id="Lite_Merchant_ApplicationID" />
                        </td>
                    </tr>
                    <tr>
                        <td class="clsInformation" align="center" style="border-bottom: 1px solid black;"
                            colspan="3">
                            <input type="submit" name="buttonSubmit" value="Submit" id="Submit1"
                                onclick="javascript:submitForm();" class="clsInputSubmit" style="width:75px;" />
                        </td>
                    </tr>
                </table>

                <table id="tblCardInformation" class="clsQuery" style="top: 10px; visibility: hidden">
                    <tr>
                        <td class="clsQueryHeading" align="left">
                        </td>

                        <td class="clsQuery" align="left">
                            <input type="hidden" name="Ecom_Payment_Card_Protocols" id="Ecom_Payment_Card_Protocols"
                                value="iVeri" />
                        </td>

                    </tr>
                </table>

                <!-- Other Optional fields that can be set -->
                <input type="hidden" name="Lite_Order_Terminal" id="Lite_Order_Terminal" value="77777001" />

                <input type="hidden" name="Lite_Order_AuthorisationCode" id="Lite_Order_AuthorisationCode" />
                <input type="hidden" name="Lite_Website_TextColor"id="Lite_Website_TextColor" value="#ffffff" />
                <input type="hidden" name="Lite_Website_BGColor" id="Lite_Website_BGColor" value="#1C4231" />
                <input type="hidden" name="Lite_ConsumerOrderID_PreFix" id="Lite_ConsumerOrderID_PreFix"
                    value="LITE" />

                <input type="hidden" name="Lite_Website_Successful_Url" id="Lite_Website_Successful_Url"
                    value="http://127.0.0.1:8000/success" />
                <input type="hidden" name="Lite_Website_Fail_Url" id="Lite_Website_Fail_Url"
                    value="http://127.0.0.1:8000/fail" />
                <input type="hidden" name="Lite_Website_Error_Url" id="Lite_Website_Error_Url"
                    value="http://127.0.0.1:8000/fail" />
                <input type="hidden" name="Lite_Website_Trylater_Url" id="Lite_Website_Trylater_Url"
                    value="http://127.0.0.1:8000/fail" />


                <!-- Ecml start-->


            </form>


            <script type="text/javascript">
                var tAmount = document.getElementById("Transaction_Amount");
                tAmount.focus(); //sets focus to element
                var val = tAmount.value; //store the value of the element
                tAmount.value = ''; //clear the value of the element
                tAmount.value = val; //set that value back.

                function updateForm() {
                    var tAmount = document.getElementById("Transaction_Amount");
                    document.getElementById("Transaction_LineItems_Amount_1").value = tAmount.value;

                    var tApplication = document.getElementById("Merchant_ApplicationID");
                    document.getElementById("Lite_Merchant_ApplicationID").value = tApplication.value;

                    document.getElementById("Lite_Order_Amount").value = tAmount.value.replace('.', '');
                    document.getElementById("Lite_Order_LineItems_Amount_1").value = tAmount.value.replace('.', '');
                }

                function submitForm() {
                    updateForm();
                }
            </script>
        </div>
    </center>


    <center>

    </center>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/playstore/resources/views/iveri.blade.php ENDPATH**/ ?>