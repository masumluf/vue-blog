
<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            <form method="POST" action="/api/posts" @submit.prevent="addTask()">
              <div class="form-group">
                <label for="exampleInputEmail1">Task Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter task"
                  v-model="title"
                />
                <small
                  id="emailHelp"
                  class="form-text text-muted"
                >We'll never share your email with anyone else.</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
      title: ''
    }
  },

  methods: {
    addTask() {
      axios.post('api/posts', { title: this.title })
        .then((res) => console.log(res.data))
        .catch((err) => console.log(err));
      Event.$emit('done', { task: this.title })
      this.title = '';
    }
  },

}
</script>




