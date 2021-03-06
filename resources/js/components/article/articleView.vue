<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ article.title }}</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Краткое описание</th>
                    <th>Сообщение</th>
                    <th>Пользователь</th>
                    <th>Категория</th>
                    <th width="100">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ article.title }}</td>
                    <td>{{ article.short_article }}</td>
                    <td>{{ article.full_article }}</td>
                    <td>{{ article.user_id }}</td>
                    <td>{{ article.category_id }}</td>
                    <td>
                        <router-link :to="{name: 'articleEdit', params: {id: article.id}}"
                                     class="btn btn-xs btn-warning btn-sm">
                            Редактировать
                        </router-link>
                        <a href="#"
                           class="btn btn-xs btn-danger btn-sm"
                           v-on:click="deleteEntry(article.id, index)">
                            Удалить
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
export default {
    data: function () {
        return {
            article: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/article/1')
            .then(function (resp) {
                app.article = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Не могу загрузить");
            });
    },

}
</script>
