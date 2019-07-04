<template>
    <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">Dashboard
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
              <li>Dashboard
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
        <div class="row">
          <div class="col-md-4">
            <center>
            <i class="fa fa-users" style="font-size:50px;"></i> <br>
            <h3>{{users}} Users</h3>
            </center>
          </div>
          <div class="col-md-4">
            <center>
            <i class="fa fa-hotel" style="font-size:50px;"></i> <br>
            <h3>{{rooms}} Rooms</h3>
            </center>
          </div>
          <div class="col-md-4">
            <center>
            <i class="fa fa-calendar-plus-o" style="font-size:50px;"></i> <br>
            <h3>{{brooms}} Total Reservations</h3>
            </center>
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
              users: '',
              rooms: '',
              brooms: '',
                                     
            }
        },
         methods:{
          loadUsers(){                                            
                // this.loading = true;
                axios.get("../api/cusers")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.users = response.data;
                })              
            },                                  
            loadRooms(){                                            
                // this.loading = true;
                axios.get("../api/crooms")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.rooms = response.data;
                })              
            },
            loadBrooms(){                                            
                // this.loading = true;
                axios.get("../api/cbrooms")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.brooms = response.data;
                })              
            },
        }, 
        mounted() {          
            console.log('Component mounted.')            
            this.loadUsers(); 
            this.loadRooms(); 
            this.loadBrooms(); 
        }
    }
</script>
