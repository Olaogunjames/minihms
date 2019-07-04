<template>
    <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">Rooms
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
              <li>Rooms
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addroommodal">
        Add Room
        </button>
        <div class="modal fade" id="addroommodal" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                         
            <form @submit.prevent="addRoom" id="addRoom" :enctype="'multipart/form-data'">                     
            <div class="form-group">                        
            <input v-model="form.room_number" type="number" name="room_number" placeholder="Enter Room Number"
                class="form-control" :class="{ 'is-invalid': form.errors.has('room_number') }">
            <has-error :form="form" field="room_number"></has-error>
            </div>
            <div class="form-group">                        
            <input v-model="form.room_name" type="text" name="room_name" placeholder="Enter Room Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('room_name') }">
            <has-error :form="form" field="room_name"></has-error>
            </div>  
            <div class="form-group">                        
            <input v-model="form.room_price" type="number" name="room_price" placeholder="Enter Room Price"
                class="form-control" :class="{ 'is-invalid': form.errors.has('room_price') }">
            <has-error :form="form" field="room_price"></has-error>
            </div>
            <div class="form-group"> 
            <textarea v-model="form.room_description"  placeholder="Enter Room Description" name="room_description" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('room_description') }"></textarea>                       
            <has-error :form="form" field="room_description"></has-error>                       
            </div> 
            <div class="form-group">
                  <label for="image">Room Image</label>
                  <input type="file" name="image" @change="imageFunction" class="form-control"> 
                </div>
            <h4>Facilities</h4>
            <div class="row">
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.tv" 
                
                type="checkbox" 
                name="tv" /> Flat Screen TV
              </div>
              </div>
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.breakfast" 
                
                type="checkbox" 
                name="breakfast" /> Breakfast Included
              </div>
              </div>  
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.wifi" 
                
                type="checkbox" 
                name="wifi" /> Wi-Fi
              </div>
              </div> 
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.soundproof" 
                
                type="checkbox" 
                name="soundproof" /> Soundproof
              </div>
              </div> 
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.computer" 
                
                type="checkbox" 
                name="computer" /> Computer
              </div>
              </div> 
              <div class="col-sm-6">
            <div class="form-group">
              <input v-model="form.ac" 
                
                type="checkbox" 
                name="ac" /> Air Condition
              </div>
              </div> 
            </div>                                                                             
            <center>
            <button type="submit" class="addroom btn btn-info" style="color:#fff;">Add Room</button>
            </center>
            </form>
            </div>
            </div>                        
        </div>
        </div> <br>
        <br>  <br>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Facilities</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="room in rooms" :key="room.id">               
                <th scope="row">RM{{room.room_number}}</th>
                <td>{{room.room_name}}</td>
                <td> <br>
                  <center><img :src="'../image/' + room.image" alt="room" class="room-thumb"></center>
                {{room.room_description}}
                </td>
                <td>{{room.room_price}}</td>
                <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" :data-target="'#RM' + room.room_number">
                  View Facilities
                  </button>
                  <!--Biodata Modal -->
                      <div class="modal fade" :id="'RM' + room.room_number" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Facilities</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <p v-if="room.tv">Television</p>
                            <p v-if="room.breakfast">BreakFast</p>
                            <p v-if="room.wifi">Wi-Fi</p>
                            <p v-if="room.soundproof">Sound Proof</p>
                            <p v-if="room.computer">Computer</p>
                            <p v-if="room.ac">Air Conditon</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                          </div>
                      </div>
                      </div>
                </td>
                <td>                  
                    <button  @click="editModal(room)" class="btn btn-info">
                      <i class="fa fa-edit" style="color:#fff;"></i>
                    </button> 
                    <br><br>
                     <button  @click="deleteRoom(room.id)" class="btn btn-danger">
                      <i class="fa fa-trash" style="color:#fff;"></i>
                    </button>                                       
                </td>
              </tr>             
            </tbody>
          </table>
          <div class="modal fade in" id="editroom" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Room</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">                         
                  <form @submit.prevent="updateRoom" id="addRoom">                                        
                  <div class="form-group">                        
                  <input v-model="form.room_number" type="number" name="room_number" placeholder="Enter Room Number"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('room_number') }">
                  <has-error :form="form" field="room_number"></has-error>
                  </div>
                  <div class="form-group">                        
                  <input v-model="form.room_name" type="text" name="room_name" placeholder="Enter Room Name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('room_name') }">
                  <has-error :form="form" field="room_name"></has-error>
                  </div>  
                  <div class="form-group">                        
                  <input v-model="form.room_price" type="number" name="room_price" placeholder="Enter Room Price"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('room_price') }">
                  <has-error :form="form" field="room_price"></has-error>
                  </div>
                  <div class="form-group"> 
                  <textarea v-model="form.room_description"  placeholder="Enter Room Description" name="room_description" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('room_description') }"></textarea>                       
                  <has-error :form="form" field="room_description"></has-error>                       
                  </div> 
                  <div class="form-group">
                  <label for="image">Room Image</label>
                  <input  type="file" name="image" @change="imageFunction" class="form-control"> 
                </div>
                  <h4>Facilities</h4>
                  <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.tv" 
                      
                      type="checkbox" 
                      name="tv" /> Flat Screen TV
                    </div>
                    </div>
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.breakfast" 
                      
                      type="checkbox" 
                      name="breakfast" /> Breakfast Included
                    </div>
                    </div>  
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.wifi" 
                      
                      type="checkbox" 
                      name="wifi" /> Wi-Fi
                    </div>
                    </div> 
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.soundproof" 
                      
                      type="checkbox" 
                      name="soundproof" /> Soundproof
                    </div>
                    </div> 
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.computer" 
                      
                      type="checkbox" 
                      name="computer" /> Computer
                    </div>
                    </div> 
                    <div class="col-sm-6">
                  <div class="form-group">
                    <input v-model="form.ac" 
                      
                      type="checkbox" 
                      name="ac" /> Air Condition
                    </div>
                    </div> 
                  </div>                                                                             
                  <center>
                  <button type="submit" class="updateroom btn btn-info" style="color:#fff;">Update Room</button>
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
              rooms: {},
              form: new Form({
                    id: '',
                    room_number: '',
                    room_name: '',
                    room_price: '',
                    room_description: '',
                    image: '',
                    tv: '',
                    breakfast: '',
                    wifi: '',
                    soundproof: '',
                    computer: '',
                    ac: ''
                })              
            }
        },
        methods:{
          loadRooms(){                                            
                // this.loading = true;
                axios.get("../api/rooms")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.rooms = response.data;
                })              
            },          
            // loadStaffs(){                            
            //      axios.get('api/staff').then(({data}) => (this.staffs = data));                 
            // },
            imageFunction(e){
              console.log('effkhkdfjkdfjkdf');
              let file = e.target.files[0];
              let reader = new FileReader();
              reader.onloadend = (file) => {
                this.form.image = reader.result;
              }
              reader.readAsDataURL(file);
            },
            editModal(room){
              $('#editroom').modal('show');
              this.form.fill(room);              
            },
             deleteRoom(id){
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
                        this.form.delete('../api/rooms/'+id).then(
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
             addRoom(){
                $('.addroom').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('../api/rooms').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Room Added Successfully'
                        })   
                        $('.addroom').html('Add Room'); 
                        $('#addRoom').trigger('reset'); 
                        Fire.$emit('afterAction');
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Data not correctly inputed'
                        })   
                        $('.addroom').html('Add Room');
                        });                                      
            },
            updateRoom(){
                $('.updateroom').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('../api/rooms/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editroom').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Room Updated Successfully'
                        })   
                        $('.updateroom').html('Update Room'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Data not correctly inputed'
                        })   
                        $('.updateroom').html('Update Room');
                        });                                      
            }
        },        
        mounted() {
            console.log('Component mounted.')                        
            this.loadRooms(); 
            Fire.$on('afterAction', () => {this.loadRooms()})                                   
        }
    }
</script>

