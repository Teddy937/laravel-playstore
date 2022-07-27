<template>
  <div>
    <div class="row">
      <div class="col-md-10 m-auto">
        <div class="card">
          <div class="card-header bg-white d-flex justify-content-between">
            <h2 class="card-title mb-0">Tasks</h2>
            <a
              href="javascript:void(0)"
              data-bs-toggle="modal"
              data-bs-target="#add"
              class="btn btn-sm float-end btn-primary"
              >Add Task</a
            >
          </div>
          <div class="card-body">
            <table class="table table-sm table-bordered">
              <thead>
                <th>Title</th>
                <th>Date & Time</th>
                <th>Task Count</th>
                <th>Sub tasks</th>
                <th>Detail</th>
              </thead>
              <tbody>
                <tr v-for="task in tasks" :key="task.id">
                  <td>{{ task.title }}</td>
                  <td>{{ task.date }} | {{ task.time }}</td>
                  <td>{{ task.sub_tasks.length }}</td>
                  <td>
                    <a
                      href="#"
                      @click.prevent="show_sub_tasks(task)"
                      class="btn btn-sm btn-success"
                      >Sub tasks</a
                    >
                  </td>
                  <td>{{ task.detail }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- task modal -->
        <div class="modal fade" id="add">
          <div class="modal-lg modal-dialog">
            <div class="modal-content">
              <form @submit.prevent="store_task()">
                <div class="modal-header">
                  <h5 class="modal-title">Add Task</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="">Title</label>
                        <input
                          type="text"
                          required
                          v-model="title"
                          class="form-control form-control-sm"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="">Date</label>
                        <input
                          type="date"
                          required
                          v-model="date"
                          class="form-control form-control-sm"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="">Time</label>
                        <input
                          type="time"
                          required
                          v-model="time"
                          class="form-control form-control-sm"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="">Detail</label>
                        <input
                          type="text"
                          required
                          v-model="detail"
                          class="form-control form-control-sm"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a
                    href="#"
                    data-bs-dismiss="modal"
                    class="btn btn-sm btn-danger"
                    >Cancel</a
                  >
                  <button type="submit" class="btn btn-sm btn-success">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /task modal -->
        <!-- sub task modal -->
        <div class="modal fade" id="sub_task">
          <div class="modal-lg modal-dialog">
            <div class="modal-content">
              <form @submit.prevent="store_task()">
                <div class="modal-header">
                  <h5 class="modal-title">Add Sub Task</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  <div
                    class="row"
                    v-for="(sub_task_data, index) in sub_task_datas"
                    :key="index"
                  >
                    <div class="col-10">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="">Title</label>
                            <input
                              type="text"
                              required
                              v-model="sub_task_data.title"
                              class="form-control form-control-sm"
                            />
                            <span
                              class="text-danger"
                              v-show="sub_task_errors[index].title"
                              >Title is required</span
                            >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="">Start Date</label>
                            <input
                              type="date"
                              required
                              v-model="sub_task_data.start_date"
                              class="form-control form-control-sm"
                            />
                            <span
                              class="text-danger"
                              v-show="sub_task_errors[index].start_date"
                              >Start date is required</span
                            >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="">End Date</label>
                            <input
                              type="date"
                              required
                              v-model="sub_task_data.end_date"
                              class="form-control form-control-sm"
                            />
                            <span
                              class="text-danger"
                              v-show="sub_task_errors[index].end_date"
                              >End date is required</span
                            >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="">Detail</label>
                            <input
                              type="text"
                              required
                              v-model="sub_task_data.detail"
                              class="form-control form-control-sm"
                            />
                            <span
                              class="text-danger"
                              v-show="sub_task_errors[index].detail"
                            >
                              Detail is required</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto float-end pt-4">
                      <button
                        @click.prevent="addSubTaskData()"
                        class="btn btn-sm btn-success"
                      >
                        &plus;
                      </button>
                      <button
                        v-if="sub_task_datas.length > 1 && index > 0"
                        @click.prevent="removeSubTaskData(index)"
                        class="btn btn-sm btn-danger"
                      >
                        &times;
                      </button>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a
                    href="#"
                    data-bs-dismiss="modal"
                    class="btn btn-sm btn-danger"
                    >Cancel</a
                  >
                  <button
                    type="submit"
                    @click.prevent="
                      !sub_edit_mode ? store_sub_task() : update_sub_task()
                    "
                    class="btn btn-sm btn-success"
                  >
                    {{ !sub_edit_mode ? "Store sub task" : "update sub task" }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /sub task modal -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["save-url", "fetch-url"],
  components: {},
  data() {
    return {
      title: "",
      date: "",
      time: "",
      detail: "",
      tasks: [],
      sub_task_datas: [],
      sub_task_errors: [],
      sub_tasks: {},
      sub_edit_mode: false,
    };
  },
  mounted() {
    this.fetch_all();
  },
  methods: {
    fetch_all() {
      axios
        .get(this.fetchUrl)
        .then((res) => {
          this.tasks = res.data.tasks;
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    store_task() {
      let data = {
        title: this.title,
        date: this.date,
        time: this.time,
        detail: this.detail,
      };
      axios
        .post(this.saveUrl, data)
        .then((res) => {
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    show_sub_tasks(task) {
      this.sub_tasks = task.sub_tasks;
      this.sub_task_datas = [
        {
          id: "",
          task_id: task.id,
          title: "",
          detail: "",
          stard_date: "",
          end_date: "",
        },
      ];
      this.sub_task_errors = [
        {
          title: false,
          start_date: false,
          end_date: false,
          detail: false,
        },
      ];

      $("#sub_task").modal("show");
    },
    addSubTaskData(task) {
      this.sub_task_datas.push({
        id: "",
        task_id: this.sub_task_datas[0].id,
        title: "",
        detail: "",
        stard_date: "",
        end_date: "",
      });
      this.sub_task_errors.push({
        title: false,
        start_date: false,
        end_date: false,
        detail: false,
      });
    },
    removeSubTaskData(index) {
      this.sub_task_datas.splice(index, 1);
      this.sub_task_errors.splice(index, 1);
    },
    store_sub_task() {
      for (let i = 0; i < this.sub_task_datas.length; i++) {
        this.sub_task_datas[i].title == ""
          ? (this.sub_task_errors[i].title = true)
          : (this.sub_task_errors[i].title = false);
        this.sub_task_datas[i].start_date == ""
          ? (this.sub_task_errors[i].start_date = true)
          : (this.sub_task_errors[i].start_date = false);
        this.sub_task_datas[i].end_date == ""
          ? (this.sub_task_errors[i].end_date = true)
          : (this.sub_task_errors[i].end_date = false);
        this.sub_task_datas[i].detail == ""
          ? (this.sub_task_errors[i].detail = true)
          : (this.sub_task_errors[i].detail = false);
      }

      let result = this.sub_task_datas.every((sub_task) => {
        return (
          sub_task.title &&
          sub_task.start_date &&
          sub_task.end_date &&
          sub_task.detail
        );
      });

      if (result) {
        //submit
      } else {
        alert("All fields are mandatory");
      }
    },
    update_sub_task() {},
  },
};
</script>
