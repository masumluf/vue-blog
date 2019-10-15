<template>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List of Information</h3>
    </div>
    <div class="card-body">
      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-6"></div>
          <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
          <router-link class="btn btn-primary" to="/addcat">Add Account</router-link>
          <div class="col-sm-12">
            <table
              id="example2"
              class="table table-bordered table-hover dataTable"
              role="grid"
              aria-describedby="example2_info"
            >
              <thead>
                <tr role="row">
                  <th
                    class="sorting_asc"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-sort="ascending"
                    aria-label="Rendering engine: activate to sort column descending"
                  >Serial No</th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Browser: activate to sort column ascending"
                  >Catagory Name</th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                  >Date</th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                  >Action(s)</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  role="row"
                  class="odd"
                  v-for="(catagory,index) in getAllCatagorey"
                  :key="catagory.id"
                >
                  <td class="sorting_1">{{index+1}}</td>
                  <td>{{catagory.cat_name}}</td>
                  <td>{{catagory.created_date|timeFormat}}</td>
                  <td>
                    <router-link :to="`/editcatagory/${catagory.id}/${catagory.cat_name}`">Edit</router-link>/
                    <a href="#" @click.prevent="deleteCatagory(catagory.id)">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      catagories: {}
    }
  },
  mounted() {
    this.$store.dispatch('getAllCatagory')

  },
  computed: {

    getAllCatagorey() {
      return this.$store.getters.getCatagoryValue
    }
  },
  methods: {
    deleteCatagory(id) {
      axios.get('/deletecatagory/' + id)
        .then((response) =>
          toast.fire({
            type: 'success',
            title: 'Item Deleted successfully'
          }),
          this.$store.dispatch('getAllCatagory')
        )
    }
  }
}
</script>


