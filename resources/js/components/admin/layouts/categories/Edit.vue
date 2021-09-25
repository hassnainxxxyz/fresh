<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Category </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{name: 'categories.all'}">Categories</router-link></li>
                            <li class="breadcrumb-item active">Edit </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>







        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <form @submit.prevent="submitData($event)" @keydown="removeErrors($event)">
                        <label for="name">Name: </label>
                        <input type="text" v-model="form.name" :class="{'is-invalid': theErrors.name}" class="form-control" id="name">
                        <small class="invalid-feedback">{{theErrors.name}}</small>
                        <label for="description">Description: </label>
                        <textarea name="" v-model="form.description"
                                  :class="{'is-invalid': theErrors.description}"
                                  id="description" cols="30" rows="10"
                                  class="form-control "></textarea>
                        <small class="invalid-feedback">{{theErrors.description}}</small>
                        <br>
                        <button type="submit" class="btn btn-lg btn-info">Update</button>

                    </form>




                </div>
            </div>
        </div>






    </div>
</template>










<script>
export default {
    data() {
        return {
            category: null,
            errors: {},
            form: {
              name: '',
              description: '',

            },

        };
    },
    computed: {
      theErrors() {
          return this.errors;
      }
    },
    created() {
        axios({
            method: 'get',
            url: APIURL+'/api/categories/'+this.$route.params.id,
            headers: {
                'authorization': "Bearer "+localStorage.getItem('token'),
            }
        })
            .then(res => {
               if(res.data) {

                   this.form.name = res.data.name;
                   this.form.description = res.data.description;

               }
            });

    },
    methods: {
        removeErrors(ev) {

            this.errors[ev.target.id] = null;
        },
      submitData(ev) {
        axios({
            method: 'put',
            url: APIURL+'/api/categories/'+this.$route.params.id,
            data: {
              name: this.form.name,
              description: this.form.description,
            },
        })
            .then(res => {
                if (res.data.errors) {

                    this.errors = res.data.errors;


                }
                if (res.data === 1) {
                    Vue.$toast.open('Category updated successfully');


                }

            });
      },
    },
}
</script>