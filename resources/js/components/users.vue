<template>
    <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">Users
            </h2><!--/.page-heading-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container--> 
    </div><!--/.page-heading-area-->
    <div class="page-nav-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb page-nav list-unstyled">
              <li><router-link to="/">Home</router-link></li>
              <li>Users
              </li>
            </ul><!--/.page-nav-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.page-title-area-->    

    
    <div class="d-flex container" id="wrapper">

    <!-- Sidebar -->
    <Sidebar />    
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">        
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Registered at</th>
                <th scope="col">Action</th>                
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">               
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td> {{user.phone_number}}</td>
                <td>{{user.email}}</td>
                <td v-if = "user.role == 1">Admin</td>
                <td v-else>User</td>
                <td>{{user.created_at}}  </td>
                <td>
                    <button  @click="editModal(user)" class="btn btn-info">
                      <i class="fa fa-edit" style="color:#fff;"></i>
                    </button> 
                    <br><br>
                     <button  @click="deleteUser(user.id)" class="btn btn-danger">
                      <i class="fa fa-trash" style="color:#fff;"></i>
                    </button>     
                 </td>                
              </tr>             
            </tbody>
          </table>
          <div class="modal fade in" id="edituser" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">                         
                  <form @submit.prevent="updateUser" id="addRoom">                                        
                  <div class="form-group">                        
                  <input v-model="form.name" type="text" name="name" placeholder="Enter Name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
                  </div>
                  <div class="form-group">                        
                  <input v-model="form.phone_number" type="number" name="phone_number" placeholder="Enter Phone Number"     class="form-control" :class="{ 'is-invalid': form.errors.has('phone_number') }">
                  <has-error :form="form" field="phone_number"></has-error>
                  </div>  
                  <div class="form-group">                        
                  <input v-model="form.email" type="email" name="email" placeholder="Enter Email"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                  </div>               
                  <center>
                  <button type="submit" class="updateuser btn btn-info" style="color:#fff;">Update User</button>
                  </center>
                  </form>
                  </div>
                  </div>                        
              </div>
              </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  </div>
  <!-- /#wrapper -->

</template>

<script>
    import Sidebar from './Sidebar'
    export default {
       data(){
            return {
              users: {},
              form: new Form({
                    id: '',
                    name: '',
                    phone_number: '',
                    email: ''
                })                          
            }
        },
        methods:{
          loadUsers(){                                            
                // this.loading = true;
                axios.get("../api/users")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.users = response.data;
                })              
            },                      
            editModal(user){
              $('#edituser').modal('show');
              this.form.fill(user);              
            },             
            updateUser(){
                $('.updateuser').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('../api/updateuser/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#edituser').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'user Updated Successfully'
                        })   
                        $('.updateuser').html('Update User'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Data not correctly inputed'
                        })   
                        $('.updateuser').html('Update User');
                        });                                      
            },
            deleteUser(id){
                swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            //delete qury below
                            if (result.value) {
                                swal.fire({
                                position: 'center',
                                type: 'info',
                                title: 'Processing Delete',
                                showConfirmButton: false,
                                timer: 1000
                                })
                        this.form.delete('../api/deleteuser/'+id).then(
                            ()=>{
                                swal.fire(
                                'Deleted!',
                                'Deleted Successfully.',
                                'success'
                                )
                                Fire.$emit('afterAction');
                            }).catch(
                                ()=>{
                                swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                })  
                                }); 
                            }                       
                        })
            },
        },        
        mounted() {
            console.log('Component mounted.')                        
            this.loadUsers(); 
            Fire.$on('afterAction', () => {this.loadUsers()})                                   
        }
    }
</script>

