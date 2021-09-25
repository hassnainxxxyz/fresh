<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Categories </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>












        <div class="card">
            <div class="card-header">
                <h3 style="display: inline" class="card-title">Data Table With Full Features</h3>
                <router-link :to="{name: 'category.create'}" class="btn btn-info" style="float: right">Add new Category</router-link>
                <span style="clear: both;"></span>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <div class="row justify-content-end"><div class="col-sm-12">








                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">



                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 161.203px;">
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 212.859px;">
                                    Description
                                </th>


                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                     aria-label="CSS grade: activate to sort column ascending"
                                     style="width: 94.3906px;">Actions</th></tr>
                            </thead>
                            <tbody>

























































                            <tr role="row" class="even" v-for="category in theLaravelData.data" :key="category.id">
                                <td class="sorting_1">{{category.name | filterVal}}</td>
                                <td>{{category.description | filterVal}}</td>

                                <td>
                                    <router-link :to="{name: 'category.edit', params: {id: category.id}}" class="btn btn-sm btn-warning">Edit</router-link>
                                    <button  @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</button>
                                </td>

                            </tr>



                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <!--<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">-->
                            <!--Showing 1 to 10 of 57 entries-->
                            <!--</div>-->
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <div style="float: right;">
                                    <pagination :data="laravelData" @pagination-change-page="getResults">
                                    </pagination>

                                </div>
                                <span style="clear: both;"></span>

                            </div></div></div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>












    </div>
</template>


<script>
    export default {
        data() {

            return {
                laravelData: {},

            }
        },
        computed: {
            theLaravelData() {
                return this.laravelData;
            }
        },
        mounted() {
            this.getResults();



        },

        methods: {
            deleteCategory(id) {
              axios({
                  method: 'delete',
                  url: APIURL+'/api/categories/'+id,
              })
                  .then(res => {
                     if(res.data === 1) {
                         this.getResults();
                     }
                  });
            },
            getResults(page = 1) {
                axios({
                    method: 'get',
                    url: APIURL+'/api/fetch-categories-pagination?page='+ page,
                    headers: {
                        'authorization': "Bearer "+localStorage.getItem('token'),
                    },
                })
                    .then(response => {
                        console.log(response.data);


                        this.laravelData = response.data;
                    });
            },
        },
        filters: {
          filterVal(x) {
              return x.substring(0, 30);
          }
        },
    }
</script>





