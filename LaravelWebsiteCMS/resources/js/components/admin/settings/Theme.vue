<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Header Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.header_style'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
                <option value="style6">Style 6</option>
                <option value="style7">Style 7</option>
                <option value="style8">Style 8</option>
                <option value="style9">Style 9</option>
                <option value="style10">Style 10</option>


            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Slider Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.slider_style'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
            </select>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Banner</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.banner_style'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
                <option value="style6">Style 6</option>
                <option value="style7">Style 7</option>
                <option value="style8">Style 8</option>
                <option value="style9">Style 9</option>
                <option value="style10">Style 10</option>
                <option value="style11">Style 11</option>
                <option value="style12">Style 12</option>
                <option value="style13">Style 13</option>
                <option value="style14">Style 14</option>
                <option value="style15">Style 15</option>
                <option value="style16">Style 16</option>
                <option value="style17">Style 17</option>
                <option value="style18">Style 18</option>
                <option value="style19">Style 19</option>
            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Footer</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.Footer_style'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
                <option value="style6">Style 6</option>
                <option value="style7">Style 7</option>
                <option value="style8">Style 8</option>
                <option value="style9">Style 9</option>
                <option value="style10">Style 10</option>
            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Card Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.card_style'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
                <option value="style6">Style 6</option>
                <option value="style7">Style 7</option>
                <option value="style8">Style 8</option>
                <option value="style9">Style 9</option>
                <option value="style10">Style 10</option>
                <option value="style11">Style 11</option>
                <option value="style12">Style 12</option>
                <option value="style13">Style 13</option>
                <option value="style14">Style 14</option>
                <option value="style15">Style 15</option>
                <option value="style16">Style 16</option>
                <option value="style17">Style 17</option>
                <option value="style18">Style 18</option>
                <option value="style19">Style 19</option>
                <option value="style20">Style 20</option>

            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Card Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.cart_page'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
            </select>

        </fieldset>
    </div>
    <!-- <div class="col-md-6">
        <label>About Us Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.about_us'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
            </select>

        </fieldset>
    </div> -->

    <div class="col-md-6">
        <label>Blog Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.blog'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Contact Us Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.contact_us'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
            </select>

        </fieldset>
    </div>

    <div class="col-md-6">
        <label>Login Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.login'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
            </select>

        </fieldset>
    </div>

    <div class="col-md-6">
        <label>Product Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.product_detail'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
            </select>

        </fieldset>
    </div>

    <div class="col-md-6">
        <label>Shop Page Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.shop'>
                <option value="style1">Style 1</option>
                <option value="style2">Style 2</option>
                <option value="style3">Style 3</option>
                <option value="style4">Style 4</option>
                <option value="style5">Style 5</option>
            </select>

        </fieldset>
    </div>

    <div class="col-md-6">
        <label>Website Color Scheme</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='theme.color'>
                <option value="style">Blue</option>
                <option value="red">Red</option>
                <option value="black">Black</option>
                <option value="bilobaflower">Biloba Flower</option>
                <option value="brickred">Brickred</option>
                <option value="brown">Brown</option>
                <option value="darkblue">Dark Blue</option>
                <option value="darkbrown">Dark Brown</option>
                <option value="darkgray">Dark Gray</option>
                <option value="ferozi">Ferozi</option>
                <option value="green">Green</option>
                <option value="lightblue">Light Blue</option>
                <option value="lightbrown">Light Brown</option>
                <option value="lightferozi">Light Ferozi</option>
                <option value="lightpink">Light Pink</option>
                <option value="moss">Moss</option>
                <option value="orange">Orange</option>
                <option value="panetone">Pane Tone</option>
                <option value="parrot">Parrot</option>
                <option value="pink">Pink</option>
                <option value="purple">Purple</option>
                <option value="seapink">Sea Pink</option>
                <option value="smokegray">Smoke Gray</option>
                <option value="voiltsky">Voilt Sky</option>
                <option value="yellow">Yellow</option>
            </select>

        </fieldset>
    </div>








    
    <div class="col-md-12">
        <button @click="updateSetting()" type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
</div>
</template>

<script>
import ErrorHandling from "./../../../ErrorHandling";
export default {
  data() {
    return {
      theme: {
        header_style: "style1",
        Footer_style: "style1",
        slider_style: "style1",
        banner_style: "style1",
        card_style: "style1",
        about_us: "style1",
        blog: "style1",
        cart_page: "style1",
        contact_us: "style1",
        login: "style1",
        product_detail: "style1",
        shop: "style1",
        color: "red",
      },
      billers: [],
      warehouses: [],
      customers: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchSetting() {
      this.$emit("updateLoadingState", true);
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/setting?type=web_theme_setting", config)
        .then((res) => {
          for (var i = 0; i < res.data.data.length; i++) {
            Object.assign(responseData, {
              [res.data.data[i].setting_key]: res.data.data[i].setting_value,
            });
          }
          console.log("response datass", responseData);
          this.theme = responseData;
        })
        .finally(() => this.$emit("updateLoadingState", false));
    },

    updateSetting() {
      this.$emit("updateLoadingState", true);
      var theme = Object.entries(this.theme);
      var key = [];
      var value = [];

      for (var i = 0; i < theme.length; i++) {
        key.push(theme[i][0]);
        value.push(theme[i][1].toString());
      }

      console.log(key, value);

      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };

      axios
        .post(
          "/api/admin/setting/web_theme_setting",
          {
            _method: "PUT",
            key,
            value,
          },
          config
        )
        .then((res) => {
          if (res.data.status == "Success") {
            this.$toaster.success("Settings has been updated successfully");
          } else if (res.data.status == "Error") {
            this.$toaster.error(res.data.message);
          }
        })
        .catch((err) => {
          if (err.response.data.status == "Error") {
            this.$toaster.error(err.response.data.message);
          }
        })
        .finally(() => this.$emit("updateLoadingState", false));
    },
  },
  mounted() {
    this.fetchSetting();
  },
};
</script>
