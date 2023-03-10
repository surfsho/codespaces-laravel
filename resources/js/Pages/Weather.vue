<script setup>
    defineProps({ weather: Array })
</script>
<style>
.inline {
    display:inline-flex;
}
</style>
<template>
<div class="inline">
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="/">Appointments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/weather">Patients</a>
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
<div>
OpenWeatherMap

<p> timestamp {{ weather.datetime.timestamp }}</p>
<p>timestamp sunrise {{ weather.datetime.timestamp_sunrise }}</p>
<p>timestamp sunset {{ weather.datetime.timestamp_sunset }}</p>
<p> formatted date {{ weather.datetime.formatted_date }} </p>
<p>formatted day {{ weather.datetime.formatted_day }}</p>
<p>formatted time {{ weather.datetime.formatted_time }}</p>
<p>formatted sunrise {{ weather.datetime.formatted_sunrise }}</p>
<p>formatted sunset {{ weather.datetime.formatted_sunset }}</p>
</div>
</div>
</template>
