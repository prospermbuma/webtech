<!-- ===================================
 # OPTIONS API
 =================================== -->
<script>
export default {
  data() {
    return {
      name: "John Doe",
      loggedIn: false,
      status: "active",
      tasks: ["Task One", "Task Two", "Task Three"],
      link: "https://www.google.com",
      buttonName: "Sign In",
    }
  },
  methods: {
    toggleLogin() {
      this.loggedIn = !this.loggedIn;
      this.buttonName === "Sign In" ? this.buttonName = "Sign Out" : this.buttonName = "Sign In";
    },
    toggleStatus() {
      this.status === "active" ? this.status = "pending" : this.status === "pending" ? this.status = "inactive" : this.status = "active";
    }
  }
};
</script>

<template>
  <!-- ===
  v- Stands for directives 
  === -->
  <p v-if="loggedIn">
  <h1 class="success">Hi, {{ name }}</h1>
  <p v-if="status === 'active'">Status: <span class="success">{{ status.charAt(0).toUpperCase() + status.slice(1)
      }}</span></p>
  <p v-else-if="status === 'pending'">Status: <span class="warning">{{
    status.charAt(0).toUpperCase() + status.slice(1) }}</span></p>
  <p v-else>Status: <span class="danger">{{ status.charAt(0).toUpperCase() + status.slice(1) }}</span></p>
  <hr>
  <h3>Tasks:</h3>
  <ol type="A">
    <li v-for="task in tasks" :key="task">{{ task }}</li>
  </ol>
  <hr>
  <!-- === V-bind === -->
  <!-- <a v-bind:href="link" target="_blank">Go To Google</a> -->
  <!-- === The shorthand === -->
  <br>
  <a :href="link" target="_blank">Go To Google</a>
  <button @click="toggleStatus">Change Status</button>
  <br>
  <br>
  </p>
  <h3 class="info" v-else="loggedIn"> Not Logged In</h3>
  <br>
  <br>
  <!-- <button v-on:click="toggleLogin">{{ buttonName }}</button> -->
  <!-- === The shorthand === -->
  <button @click="toggleLogin">{{ buttonName }}</button>
</template>

<!-- === CSS === -->
<style scope>
.success {
  color: green;
}

.danger {
  color: red;
}

.warning {
  color: yellow;
}

.info {
  color: #d3d3d3df;
}

hr {
  margin: 5px 0;
}

button {
  border: none;
  outline: none;
  padding: 12px 24px;
  border-radius: 50px;
  transition: all 0.3s;
  color: white;
  border: 1px solid green;
  background-color: green;
}

button:hover {
  cursor: pointer;
  color: green;
  border: 1px solid white;
  background-color: transparent;
}
</style>
