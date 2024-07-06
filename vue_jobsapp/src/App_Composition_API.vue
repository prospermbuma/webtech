<!-- ===================================
 # COMPOSITION API
 =================================== -->

<!-- === Long version === -->
<!-- <script>
import { ref } from 'vue';

export default {
  setup() {
    const loggedIn = ref(false);
    const name = ref("John Doe");
    const status = ref("active");
    const tasks = ref(["Task One", "Task Two", "Task Three"]);
    const buttonName = ref("Sign In");

    const toggleLogin = () => {
      loggedIn.value = !loggedIn.value;
      buttonName.value === "Sign In" ? buttonName.value = "Sign Out" : buttonName.value = "Sign In";
    };
    const toggleStatus = () => {
      status.value === "active" ? status.value = "pending" : status.value === "pending" ? status.value = "inactive" : status.value = "active";
    };

    return {
      loggedIn,
      name,
      status,
      tasks,
      buttonName,
      toggleLogin,
      toggleStatus,
    };
  },
};
</script> -->

<!-- === Short version === -->
<script setup>
import { ref } from 'vue';

const loggedIn = ref(false);
const name = ref("John Doe");
const status = ref("active");
const tasks = ref(["Task One", "Task Two", "Task Three"]);
const buttonName = ref("Sign In");
const newTask = ref("");

const toggleLogin = () => {
  loggedIn.value = !loggedIn.value;
  buttonName.value === "Sign In" ? buttonName.value = "Sign Out" : buttonName.value = "Sign In";
};
const toggleStatus = () => {
  status.value === "active" ? status.value = "pending" : status.value === "pending" ? status.value = "inactive" : status.value = "active";
};

const addTask = () => {
  if (newTask.value.trim() !== "") {
    tasks.value.push(newTask.value);
    newTask.value = "";
  }
};

// Remove the task from any position in the tasks array
const deleteTasky = (index) => {
  tasks.value.splice(index, 1);
}

// Remove the last task from the array
const deleteTask = (index) => {
  if (tasks.value.length > 0) {
    tasks.value.pop();
  }
}

</script>

<template>
  <div class="container">
    <div class="row">
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
      <div class="row">
        <div class="col">
          <hr>
          <h3>Tasks:</h3>
          <ol type="A">
            <li v-for="(task, index) in tasks" :key="task">
              <span>
                {{ task }}
              </span>
              <div id="deleteTasky">
                <span @click="deleteTasky(index)">x</span>
              </div>
            </li>
          </ol>
          <hr>
        </div>
        <!-- === FORM === -->
        <div class="col">
          <form @submit.prevent="addTask">
            <label for="newTask">Add Task:</label>
            <input type="text" id="newTask" name="newTask" v-model="newTask" placeholder="Example: Coding" />
            <div class="buttons">
              <button type="submit" @click="addTask">Add Task</button>
              <button @click="deleteTask(index)" id="deleteTask">Delete Task</button>
            </div>
          </form>
        </div>
        <!-- === FORM ENDS === -->
      </div>
      <br>
      <button @click="toggleStatus" id="changeStatus">Change Status</button>
      <br>
      <br>
      </p>
      <h3 class="info" v-else="loggedIn"> Not Logged In</h3>
      <button @click="toggleLogin">{{ buttonName }}</button>
    </div>
  </div>
</template>

<!-- === CSS === -->
<style scope>
/* .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80vh;
  gap: 2em;
} */
/* 
.row {
  display: flex;
  justify-content: center;
  flex-direction: column;
} */

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

h3.info {
  margin-bottom: 30px;
}

form {
  display: flex;
  flex-direction: column;
  width: 400px;
  margin-top: 20px;
}

form input {
  border: none;
  outline: none;
  padding: 12px 24px;
  border-radius: 50px;
  margin: 15px 0 20px 0;
}

li {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 0.3em;
}

#deleteTasky {
  color: white;
  background: red;
  margin-left: 5px;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

#deleteTasky span {
  font-size: 10px;
  font-weight: bold;
  margin-bottom: 2px;
}

.buttons {
  display: flex;
  justify-content: space-between;
  gap: 0.5em;
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
  width: 100%;
}

button:hover {
  cursor: pointer;
  color: #ebeaea;
  border: 1px solid green;
  background-color: transparent;
}

button#changeStatus,
button#deleteTask {
  color: #ebeaea;
  border: 1px solid green;
  background-color: transparent;
}

button#changeStatus:hover,
button#deleteTask:hover {
  color: white;
  border: 1px solid green;
  background-color: green;
}
</style>
