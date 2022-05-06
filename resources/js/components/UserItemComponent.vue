<template>
    <tr>
        <td><a style="text-decoration: underline;" :href="'/users/' + this.userItem.id + '/payments'" class="link-success">{{ this.userItem.name }}</a></td>
        <td>{{ this.userItem.phone }}</td>
        <td>{{ this.userItem.email }}</td>
        <td>
            <a class="btn-sm btn-primary" :href="'/users/' + userItem.id">Изменить</a>
            <a v-on:click="deleteUser" class="btn-sm btn-danger" href="#">Удалить</a>
        </td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data: function () {
        return {
            userItem: {}
        }
    },
    methods: {
        deleteUser(event) {
            event.preventDefault()
            Swal.fire({
                title: 'Вы уверены что хотите удалить пользователя?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Да',
                denyButtonText: `Отмена`,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/users/delete', {
                        id: this.userItem.id
                    })
                    .then(res => {
                        if (res.data.status === 'ok') {
                            Swal.fire('Пользователь удалён!', '', 'success')
                            this.$emit('reloadAfterDeleting')
                        } else {
                            Swal.fire('Ошибка!', '', 'error')
                        }
                    })
                }
            })

        }
    },
    mounted() {
       this.userItem = this.user
    }
};
</script>

