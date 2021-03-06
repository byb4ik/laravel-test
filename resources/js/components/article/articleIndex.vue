<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'articleCreate'}" class="btn btn-success">
                Добавить новое сообщение
            </router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Список сообщений</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Краткое описание</th>
                        <th>Пользователь</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="article, index in articles">
                        <td>{{ article.title }}</td>
                        <td>{{ article.short_article }}</td>
                        <td>{{ article.user_id }}</td>
                        <td>
                            <router-link :to="{name: 'articleEdit', params: {id: article.id}}"
                                         class="btn btn-xs btn-default">
                                Редактировать
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(article.id, index)">
                                Удалить
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            articles: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/article')
            .then(function (resp) {
                app.articles = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Не могу загрузить");
            });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Хотите удалить?")) {
                var app = this;
                axios.delete('/article/' + id)
                    .then(function (resp) {
                        app.articles.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Не могу удалить");
                    });
            }
        }
    }
}
</script>
