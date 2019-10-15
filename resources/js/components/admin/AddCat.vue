<template>
  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" @submit.prevent="addcatgorey">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Enter Catagory Name</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              placeholder="Enter Catagory"
              v-model="form.cat_name"
              name="cat_name"
              :class="{ 'is-invalid': form.errors.has('cat_name') }"
            />
            <has-error :form="form" field="cat_name"></has-error>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="submit" value="Submit" class="btn btn-primary" />
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: new vform({
        cat_name: ''
      })
    }
  },
  methods: {
    addcatgorey() {
      this.form.post('/addcat')
        .then(() =>
          toast.fire({
            type: 'success',
            title: 'added in successfully'
          }),
          this.form.cat_name = '',
          this.$router.push('/table')
        )
        .catch((err) => console.log(err))
    }
  },
}
</script>

