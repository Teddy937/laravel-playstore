<template>
  <div>
    <div class="container">
      <br />
      <br />

      <div id="iveri-litebox"></div>

      <form name="Form1" @submit.prevent="submit()" id="Form1">
        <h3>Confirm Details</h3>
        <div class="form-group">
          <label for="">Name</label>
          <input
            type="text"
            v-model="Ecom_BillTo_Postal_Name_Prefix"
            style="width: 30px"
            id="Ecom_BillTo_Postal_Name_Prefix"
            class="clsInputReadOnlyText form-control"
          />
          <input
            v-model="Ecom_BillTo_Postal_Name_First"
            type="text"
            style="width: 100px"
            id="Ecom_BillTo_Postal_Name_First"
            class="clsInputReadOnlyText form-control"
          />
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input
            v-model="Ecom_BillTo_Online_Email"
            readonly="readonly"
            type="text"
            maxlength="50"
            id="Ecom_BillTo_Online_Email"
            class="clsInputReadOnlyText form-control"
          />
        </div>
        <div class="form-group">
          <label for=""> Merchant Reference:</label>
          <input
            v-model="Ecom_ConsumerOrderID"
            readonly="readonly"
            type="text"
            maxlength="20"
            id="Ecom_ConsumerOrderID"
            class="form-control clsInputReadOnlyText"
          />
          <input
            type="hidden"
            v-model="Ecom_SchemaVersion"
            id="Ecom_SchemaVersion"
          />
          <input
            type="hidden"
            v-model="Ecom_TransactionComplete"
            id="Ecom_TransactionComplete"
          />

          <input
            type="hidden"
            v-model="Lite_Authorisation"
            id="Lite_Authorisation"
          />
          <input type="hidden" v-model="Lite_Version" id="Lite_Version" />
        </div>
        <div class="form-group">
          <input
            type="text"
            readonly="readonly"
            class="clsInputReadOnlyText form-control"
            v-model="Lite_Order_LineItems_Product_1"
            id="Lite_Order_LineItems_Product_1"
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            readonly="readonly"
            class="clsInputReadOnlyText form-control"
            v-model="Lite_Order_LineItems_Quantity_1"
            id="Lite_Order_LineItems_Quantity_1"
            value="1"
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            readonly="readonly"
            class="clsInputReadOnlyText form-control"
            v-model="Transaction_LineItems_Amount_1"
            id="Transaction_LineItems_Amount_1"
          />
        </div>
        <div class="form-group">
          <input
            type="hidden"
            v-model="Lite_Order_LineItems_Amount_1"
            id="Lite_Order_LineItems_Amount_1"
          />
        </div>
        <div class="form-group">
          <label for=""> Total Order Amount:</label>
          <input
            v-model="Transaction_Amount"
            id="Transaction_Amount"
            type="text"
            maxlength="10"
            style="width: 75px"
            class="clsInputText"
          />
          <input type="text" name="Lite_Order_Amount" id="Lite_Order_Amount" />
        </div>
        <div class="form-group">
          <label for="">Merchant Application ID</label>
          <input
            v-model="Merchant_ApplicationID"
            type="text"
            maxlength="40"
            id="Merchant_ApplicationID"
            style="width: 230px"
            class="clsInputText"
          />
          <input
            type="hidden"
            v-model="Lite_Merchant_ApplicationID"
            id="Lite_Merchant_ApplicationID"
          />
        </div>
        <div class="form-group">
          <!-- Other Optional fields that can be set -->
          <input
            type="hidden"
            v-model="Lite_Order_Terminal"
            id="Lite_Order_Terminal"
          />

          <input
            type="hidden"
            v-model="Lite_Order_AuthorisationCode"
            id="Lite_Order_AuthorisationCode"
          />
          <input
            type="hidden"
            v-model="Lite_Website_TextColor"
            id="Lite_Website_TextColor"
          />
          <input
            type="hidden"
            v-model="Lite_Website_BGColor"
            id="Lite_Website_BGColor"
          />
          <input
            type="hidden"
            v-model="Lite_ConsumerOrderID_PreFix"
            id="Lite_ConsumerOrderID_PreFix"
          />

          <input
            type="hidden"
            v-model="Lite_Website_Successful_Url"
            id="Lite_Website_Successful_Url"
          />
          <input
            type="hidden"
            v-model="Lite_Website_Fail_Url"
            id="Lite_Website_Fail_Url"
          />
          <input
            type="hidden"
            v-model="Lite_Website_Error_Url"
            id="Lite_Website_Error_Url"
          />
          <input
            type="hidden"
            v-model="Lite_Website_Trylater_Url"
            id="Lite_Website_Trylater_Url"
          />
          <input
            type="hidden"
            v-model="Ecom_Payment_Card_Protocols"
            id="Ecom_Payment_Card_Protocols"
          />
        </div>
        <div class="form-group">
          <input
            type="submit"
            name="buttonSubmit"
            value="Submit"
            class="clsInputSubmit"
            style="width: 75px"
          />
        </div>

        <!-- Ecml start-->
      </form>
    </div>
  </div>
</template>


<script>
export default {
  props: [],
  components: {},
  data() {
    return {
      Ecom_BillTo_Postal_Name_Prefix: "Mr",
      Ecom_BillTo_Postal_Name_First: "Romano",
      Ecom_BillTo_Online_Email: "johndoe@gmail.com",
      Ecom_ConsumerOrderID: "AUTOGENERATE",
      Ecom_SchemaVersion: "",
      Ecom_TransactionComplete: false,
      Lite_Authorisation: false,
      Lite_Version: 2.0,
      Lite_Order_LineItems_Product_1: "Example Product#1",
      Lite_Order_LineItems_Quantity_1: 1,
      Transaction_LineItems_Amount_1: 10.0,
      Lite_Order_LineItems_Amount_1: 10.0,
      Transaction_Amount: 10.0,
      Merchant_ApplicationID: "{91D8E818-9FC9-4080-8A40-2B50858E7881}",
      Lite_Merchant_ApplicationID: "",
      Lite_Order_Terminal: "77777001",
      Lite_Order_AuthorisationCode: "",
      Lite_Website_TextColor: "#ffffff",
      Lite_Website_BGColor: "#1C4231",
      Lite_ConsumerOrderID_PreFix: "LITE",
      Lite_Website_Successful_Url: "http://127.0.0.1:8000/success",
      Lite_Website_Fail_Url: "http://127.0.0.1:8000/fail",
      Lite_Website_Error_Url: "http://127.0.0.1:8000/fail",
      Lite_Website_Trylater_Url: "http://127.0.0.1:8000/fail",
      Ecom_Payment_Card_Protocols: "iVeri",
    };
  },
  mounted() {
    liteboxInitialise(
      "https://portal.host.iveri.com/scripts/jquery/js/jquery.litebox.js"
    );

    function liteboxComplete(data) {
      console.log(data);
      axios.post("https://portal.host.iveri.com/Lite/Result.asp", data);
    }
  },
  methods: {
    submit() {
      let data = {
        Ecom_BillTo_Postal_Name_Prefix: "Mr",
        Ecom_BillTo_Postal_Name_First: "Romano",
        Ecom_BillTo_Online_Email: "johndoe@gmail.com",
        Ecom_ConsumerOrderID: "AUTOGENERATE",
        Ecom_SchemaVersion: "",
        Ecom_TransactionComplete: false,
        Lite_Authorisation: false,
        Lite_Version: 2.0,
        Lite_Order_LineItems_Product_1: "Example Product#1",
        Lite_Order_LineItems_Quantity_1: 1,
        Transaction_LineItems_Amount_1: 10.0,
        Lite_Order_LineItems_Amount_1: 10.0,
        Transaction_Amount: 10.0,
        Merchant_ApplicationID: "{91D8E818-9FC9-4080-8A40-2B50858E7881}",
        Lite_Merchant_ApplicationID: "",
        Lite_Order_Terminal: "77777001",
        Lite_Order_AuthorisationCode: "",
        Lite_Website_TextColor: "#ffffff",
        Lite_Website_BGColor: "#1C4231",
        Lite_ConsumerOrderID_PreFix: "LITE",
        Lite_Website_Successful_Url: "http://127.0.0.1:8000/success",
        Lite_Website_Fail_Url: "http://127.0.0.1:8000/fail",
        Lite_Website_Error_Url: "http://127.0.0.1:8000/fail",
        Lite_Website_Trylater_Url: "http://127.0.0.1:8000/fail",
        Ecom_Payment_Card_Protocols: "iVeri",
      };
      let config = {
        headers: { "Access-Control-Allow-Origin": "*" },
      };
      axios
        .post("https://portal.host.iveri.com/Lite/Authorise.aspx", data, {
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
          },
        })
        .then((res) => {
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
