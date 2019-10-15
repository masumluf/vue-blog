<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Posts available here</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="example1_length">
                <label>
                  Show
                  <select
                    name="example1_length"
                    aria-controls="example1"
                    class="custom-select custom-select-sm form-control form-control-sm"
                  >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select> entries
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div id="example1_filter" class="dataTables_filter">
                <label>
                  Search:
                  <input
                    type="search"
                    class="form-control form-control-sm"
                    placeholder
                    aria-controls="example1"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <router-link class="btn btn-primary" to="/addpost">Add Post</router-link>
            <div class="col-sm-12">
              <table
                id="example1"
                class="table table-bordered table-striped dataTable"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label="Rendering engine: activate to sort column descending"
                      style="width: 170px;"
                    >Serial</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      rowspan="1"
                      colspan="1"
                      style="width: 219px;"
                    >UserName</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="Platform(s): activate to sort column ascending"
                      style="width: 194px;"
                    >Category</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="Engine version: activate to sort column ascending"
                      style="width: 143px;"
                    >Post Title</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="CSS grade: activate to sort column ascending"
                      style="width: 101px;"
                    >Post Description</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="CSS grade: activate to sort column ascending"
                      style="width: 101px;"
                    >Photo</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="CSS grade: activate to sort column ascending"
                      style="width: 101px;"
                    >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr role="row" class="odd" v-for="post in getAllPosts">
                    <td></td>
                    <td class="sorting_1">{{post.id}}</td>
                    <td v-if="post.user">{{post.user.name}}</td>

                    <td v-if="post.catagory">{{post.catagory.cat_name}}</td>

                    <td>{{post.title}}</td>
                    <td>{{post.description | sortlength(40,"....")}}</td>
                    <td>
                      <img :src="ourImage(post.photo)" width="40" height="30" />
                    </td>
                    <td>
                      <router-link :to="`/editcatagory/${post}`">Edit</router-link>/
                      <a href="#" @click.prevent="deleteCatagory(catagory.id)">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</template>
<script>
export default {

  mounted() {
    this.$store.dispatch('getAllPosts')

  },
  computed: {

    getAllPosts() {
      return this.$store.getters.getPostsValue
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
    },
    ourImage(img) {
      return "uploadimage/" + img;
    },
  }
}
</script>


