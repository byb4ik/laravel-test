<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Добавить сообщение</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Заголовок</label>
                            <input type="text" v-model="article.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Краткое описание</label>
                            <input type="text" v-model="article.short_article" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Сообщение</label>
                            <input type="text" v-model="article.full_article" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Пользователь</label>
                            <input type="text" v-model="article.user_id" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="control-label">Категория</label>
                            <input type="text" v-model="article.category_id" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            article: {
                title: '',
                short_article: '',
                full_article: '',
                user_id: '',
                category_id: '',
            }
        }
    },
    methods: {
        saveForm() {
            event.preventDefault();
            let app = this;
            let newArticle = app.article;
            axios.post('/article', newArticle)
                .then(function (resp) {
                    app.$router.push({path: '/'});
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Не могу добавить!");
                });
        }
    }
}
</script>
