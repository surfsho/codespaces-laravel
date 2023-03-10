<script setup>
//component
import Layout from './Layout'
//head
import { Head } from '@inertiajs/vue3'
//data from controller
const props = defineProps({ user: Object, patients: Array })
const data = ref(props.patients);

import { computed, ref } from 'vue'
let sdate = ref('');
let edate = ref('');
//reset filter
function reset() {
  data.value = props.patients;
}
function searchname(name) {
    let temp = [...props.patients];
    let named = [];
    for(let i=0;i<temp.length;i++) {
        if(temp[i].name.includes(name))
        {
            named.push(temp[i]);
            temp.splice(i,1);
        }
    }
    data.value = named;
}
//filter between two dates
function filter(sdate,edate) {
  console.log("filter");
  console.log(sdate,edate);
  console.log(sdate);
  let sdatef = new Date(sdate);
  let edatef = new Date(edate);
  let filter = [];
  let temp = [...props.patients];
  console.log(temp);
  while(sdatef <= edatef) {
    sdatef.setDate(sdatef.getDate()+1);

    for(let i=0;i<temp.length;i++) {
      let pdate = temp[i].dateofbirth;
      pdate = new Date(pdate.substring(3,5) + "." + pdate.substring(0,2)+ "." + pdate.substring(6,12))
      if( pdate >= sdatef && pdate <= edatef) {
        filter.push(temp[i]);
        temp.splice(i,1);
      }
    }
  }
  console.log(filter);
  data.value = filter;

}

</script>
<style>
.text {
display: inline-flex;
}
body {
margin: 25px;
}
.hello {
  margin: 20px;
  width: 400px;
  height: 100px;
}
.filter > li {
margin: 10px;
}
</style>
<template>
    <div class="hello">
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello {{ user.name }}, welcome to your first Inertia app!</p>
    </div>
    <ul class="nav filter">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Search using name</a>
      <input type="text" v-model="name" @change="searchname(name)">

    </li>
    </ul>
    <ul class="nav filter">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Filter using date</a>
      <p>Pick between two dates </p>
    </li>
    <li class="nav-item">
    <input type="date" placeholder="Start Date" v-model="sdate"  />
    </li>
    <li class="nav-item">
    <input type="date" placeholder="End date" v-model="edate" />
    </li>
    <li class="nav-item">
    <button class="btn btn-primary" @click="filter(sdate,edate)">Filter</button>
    <button class="btn btn-primary" @click="reset">Reset</button>
    </li>
    </ul>
    <div class="text">
    <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Appointments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Patients</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Insurance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Surveys</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Notifications</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Review</a>
  </li>
</ul>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="item in data">
      <th scope="row">{{ item.id}}</th>
      <td> {{ item.name }} </td>
      <td>{{ item.dateofbirth }}</td>
      <td>{{ item.gender }}</td>
      <td>{{ item.email }}</td>
    </tr>
  </tbody>
</table>
</div>
</template>
