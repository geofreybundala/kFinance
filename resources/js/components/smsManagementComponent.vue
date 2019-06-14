<template>

<div class="card">
        <div class="card-header">SMS MANAGEMENT <a class="pull-right" data-toggle="modal" data-target="#add"><button class="btn btn-success">Add New <span class="fa fa-plus" ></span></button> </a></div>
        <div class="card-body">
     <div class="table-responsive-sm">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-capitalize">Event After</th>
                            <th>Loan type</th>
                            <th class="text-capitalize">message</th>     
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(record,index) in records.data" :key="index">
                            <td>{{(index+1)+((current_page-1)*per_page)}}.</td>
                            <td>{{record.duration}} Days</td>
                            <td>{{record.donation_type}}</td>
                            <td>{{record.message}}</td>
                           
                            <td >
                                   <div style="display: inline-block">
                                             <a data-toggle="modal" @click="show_data(record.id)" data-target="#edit" class='text-success'><span class="fa fa-pencil"></span></a>
                                             <a @click="delete_data(record.id)" class='text-danger'><span class="fa fa-trash"></span></a>
                                      
                                        </div>
                                
                            </td>
                        </tr>
                    
                  
                     
                
                    </tbody>
                    <tfoot>
                         <pagination :data="records"  :limit="1" @pagination-change-page="getResults" ></pagination>
                    </tfoot>
                </table>
                </div>
                </div>

                 <div >
                                    <span v-if="loan=='all'">{{end = 36 }}</span>
                                    <span v-if="loan=='Biashara'">{{end = 12 }}</span>
                                    <span v-if="loan=='Ajira Mali'">{{end = 12 }}</span>
                                    <span v-if="loan=='Executive'">{{end = 12 }}</span>
                                    <span v-if="loan=='Boresha Makazi'">{{end = 12 }}</span>
                            </div>
<!-- EDIT RECORD -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">Edit {{show.duration}}'s Loan Details </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="name" v-model="show.duration" name="name" placeholder="Name" required>
                            </div>
                        </div>

                      
                       

             

                        <div class="form-group row">
                            <label for="loan " class="col-sm-3 col-form-label">Loan</label>
                            <div class="col-sm-9">
                                <select class="form-control " name="loan" v-model="show.donation_type" id="loan">
                                    <option >all</option>
                                    <option >  Biashara</option>
                                    <option >  Ajira Mali</option>
                                    <option >  Executive</option>
                                    <option >  Boresha Makazi</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control " v-model="show.message"></textarea>
                            </div>
                        </div>

      
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button @click="update_record(show.id,show.duration,show.donation_type,show.message)" class="btn btn-primary">Update Detail <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
<!-- END 0F EDIT RECORD -->

                <!-- add new record -->
     <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">Add SMS  Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="duration" v-model="duration" name="duration" placeholder="Please,Enter number of days for sms to be send" required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="loan " class="col-sm-3 col-form-label">Loan type</label>
                            <div class="col-sm-9">
                                <select class="form-control " name="loan" v-model="loan" id="loan" >
                                   
                                    <option >all</option>
                                    <option >  Biashara</option>
                                    <option >   Ajira Mali</option>
                                    <option >  Executive</option>
                                    <option >  Boresha Makazi</option>
                                </select>
                            </div>

                           
                        </div>

                       
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Message</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " cols="5" v-model="message" required></textarea>
                                
                            </div>
                        </div>

             


                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button @click="save_record()" data-dismiss="modal" class="btn btn-primary">Save  <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
   <!-- end of add new record -->
                </div>
                
</template>

<script>
    export default {
        data(){
                   return{

                         records:[],
                         current_page:'',
                         per_page:'',
                         loan:'',
                         duration:'',
                         message:'',
                         show:[],
                         end:'',
                   }
        },methods:{
            // pagination
            getResults(page = 1) {
			axios.get('http://127.0.0.1:4500/api/sms?page=' + page)
				.then(response => {
                        this.current_page=response.data.data.current_page
                        this.per_page=response.data.data.per_page
					    this.records = response.data.data;
				});},
            getalldata(){
                axios.get('http://127.0.0.1:4500/api/sms').then(response=>{
                          this.records=response.data.data;
                          this.current_page=response.data.data.current_page
                          this.per_page=response.data.data.per_page

                })
            },show_data(id){
                 axios.get('http://127.0.0.1:4500/api/sms/'+id).then(response=>{
                    if(response.data.status==200){
                       this.show= response.data.data;
                       
                          
                    }

                });

            },save_record(){
                axios.post('http://127.0.0.1:4500/api/sms',{
                    duration:this.duration,
                    donation_type:this.loan,
                    message:this.message

                }).then(response=>{
                     this.getalldata()
                      if(response.data.status == 200){
                           alert(this.end);
                          this.message='';
                          this.loan='';
                          this.duration='';
                         
                       const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })


                } else if(response.data.status == 201){
                                const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })

                       }

                       else if(response.data.status ==202){
                             const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                  
                    else{
                         const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                    }
                    


                });
            },update_record(id,duration,loan,message){
                var data ={
                       id:id,
                      duration:duration,
                    donation_type:loan,
                    message:message
                    
                   }
                     this.loading=true

                      axios.put('http://127.0.0.1:4500/api/sms_update',data).then(
                       response=>{
                        if(response.data.status == 200){
                        this.getalldata();
                        const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })

                    }
                       else if(response.data.status == 201){
                                const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })

                       }

                       else if(response.data.status ==202){
                             const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                 
                    else{
                         const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                    }
                    
                    });

            },delete_data(loan){

             

                        this.$swal.fire({
                               title: 'Are you sure?',
                               text: "You won't be able to revert this!",
                               type: 'warning',
                               showCancelButton: true,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Yes, delete it!'
                                      }).then((result) => {
                                     if (result.value) {

                                              axios.delete('http://127.0.0.1:4500/api/sms/'+loan).then(
                                                 response=>{
                                          if(response.data.status==200){
                                                    this.$swal("Poof! record has been deleted", response.data.message, "success");
                                                    this.getalldata();
                                                        }
                    }
                )
                                 
                                                      }
})
            }

        },
        mounted() {
               this.getalldata()
        }
    }
</script>