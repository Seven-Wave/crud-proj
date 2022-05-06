<template>
    <div>
        <h1 style="text-align: center">Пользователи</h1>

        <div style="margin: auto; width: 1000px; display: flex; justify-content: space-between; align-items: center">
            <a href="/users/create" type="button" class="btn btn-outline-success">Создать</a>
            <a href="/logout" type="button" class="btn btn-outline-danger">Выйти</a>
        </div>

        <table style="margin: auto; width: 1000px" class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Номер</th>
                <th>Почта</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            <user-component
                v-for="user in users"
                :key="user.id"
                :user="user"
                @reloadAfterDeleting="reload"/>
            </tbody>
        </table>
    </div>

</template>

<script>
import UserComponent from './UserItemComponent.vue'
import axios from 'axios'
import UserFormComponent from "../views/UserFormComponent";

export default {
    components: {
        UserFormComponent,
        UserComponent
    },
    data: function () {
        return {
            users: []
        }
    },
    methods: {
        reload() {
            axios.post('/users/get')
                .then(res => {
                    this.users = res.data.users
                })
        }
    },
    mounted() {
        this.reload()
    }
};
</script>

