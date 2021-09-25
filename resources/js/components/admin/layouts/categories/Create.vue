<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Category </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{name: 'categories.all'}">Categories</router-link></li>
                            <li class="breadcrumb-item active">Create </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <form @submit.prevent="submitData()" @keydown="removeErrors($event)">
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
                        <button type="submit" class="btn btn-lg btn-secondary">Create</button>

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


        },
        methods: {
            removeErrors(ev) {

                this.errors[ev.target.id] = null;
            },
            submitData() {
                axios({
                    method: 'post',
                    url: APIURL+'/api/categories',
                   headers: {
                       'authorization': "Bearer "+localStorage.getItem('toke'),
                   },
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
                            Vue.$toast.open('Category Created successfully');


                        }

                    });
            },
        },
    }
</script>