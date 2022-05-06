<template>
    <div>
        <h1 v-if="!createMode" style="text-align: center">Пользователь {{ this.userItem.name }}</h1>
        <h1 v-else style="text-align: center">Добавить пользователя</h1>

        <div style="width: 500px; margin: auto">
            <div style="margin-bottom: 10px" class="form-group">
                <label for="exampleInputName1">Имя</label>
                <input type="text" class="form-control" id="exampleInputName1" :value="(!createMode) ? this.userItem.name : ''" aria-describedby="nameHelp" placeholder="Введите имя">
            </div>
            <div style="margin-bottom: 10px" class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" :value="(!createMode) ? this.userItem.email : ''" aria-describedby="emailHelp" placeholder="Введите почту">
            </div>
            <div style="margin-bottom: 10px" class="form-group">
                <label for="exampleInputPhone1">Телефон</label>
                <input type="text" class="form-control" id="exampleInputPhone1" :value="(!createMode) ? this.userItem.phone : ''" aria-describedby="phoneHelp" placeholder="Введите номер телефона">
            </div>
            <button v-on:click="sendForm" class="send btn btn-primary">Отправить</button>
        </div>

    </div>

</template>

<script>
export default {
    data: function () {
        return {
            userItem: {},
            createMode: false
        }
    },
    props: {
        user: {
            type: Object,
            required: false
        }
    },
    methods: {
        sendForm() {
            let name = document.getElementById('exampleInputName1').value
            let email = document.getElementById('exampleInputEmail1').value
            let phone = document.getElementById('exampleInputPhone1').value

            let sendData = {
                id: this.userItem.id,
                name: name,
                email: email,
                phone: phone
            }
            if (this.createMode) {
                axios.post('/users/create', sendData)
                    .then(res => {
                        if (res.data.status == 'ok') {
                            Swal.fire('Готово!', res.data.message, "success")
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/users'
                                    }
                                })

                        } else {
                            Swal.fire('Ошибка!', res.data.message, "error")
                        }
                    })

            } else {
                axios.post('/users/update', sendData)
                    .then(res => {
                        if (res.data.status == 'ok') {
                            Swal.fire('Готово!', res.data.message, "success")
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/users'
                                    }
                                })

                        } else {
                            Swal.fire('Ошибка!', res.data.message, "error")
                        }
                    })
            }

        }
    },
    mounted() {
        if (typeof this.user != "undefined") {
            this.userItem = JSON.parse(this.user)
            this.createMode = false
        } else {
            this.createMode = true
        }
    }
};

</script>

<style>

</style>
