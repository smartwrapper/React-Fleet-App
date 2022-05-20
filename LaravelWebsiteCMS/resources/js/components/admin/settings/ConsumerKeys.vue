<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Consumer Secret</label>
        <fieldset class="form-group mb-3">
           <input type="text" class="form-control border-dark" placeholder="" v-model='consumer.client_secret'>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Consumer Id</label>
        <fieldset class="form-group mb-3">
           <input type="text" class="form-control border-dark" placeholder="" v-model='consumer.client_id'>
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
      consumer: {
        client_secret: "",
        client_id: "",
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
        .get("/api/admin/setting?type=website_general", config)
        .then((res) => {
          for (var i = 0; i < res.data.data.length; i++) {
            if (
              res.data.data[i].setting_key == "client_secret" ||
              res.data.data[i].setting_key == "client_id"
            ) {
              Object.assign(responseData, {
                [res.data.data[i].setting_key]: res.data.data[i].setting_value,
              });
            }
          }
          console.log("response datass", responseData);
          this.consumer = responseData;
        })
        .finally(() => this.$emit("updateLoadingState", false));
    },

    updateSetting() {
    //   console.log(this.consumer);
    //   return;
      this.$emit("updateLoadingState", true);
      var consumerArray = Object.entries(this.consumer);
      var key = [];
      var value = [];

      for (var i = 0; i < consumerArray.length; i++) {
        key.push(consumerArray[i][0]);
        value.push(consumerArray[i][1].toString());
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
          "/api/admin/setting/website_general",
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
