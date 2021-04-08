<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title">List of Post</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div
					v-for="(post, index) in posts"
					:key="index"
					class="panel panel-default"
				>
					<div class="panel-heading">{{ post.title }}</div>

					<div class="panel-body">
						<p>{{ post.content }}</p>
					</div>
					<comments
						@commentCreated="commentCreated"
						:comments="post.comment_tree"
					/>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Axios from "axios";
import Comments from "./Comments";
export default {
	components: { Comments },
	data() {
		return { posts: [] };
	},
	mounted() {
		this.getPosts();
	},
	methods: {
		commentCreated() {
			this.getPosts();
		},
		async getPosts() {
			const { data } = await Axios.get("post");
			this.posts = data;
		},
	},
};
</script>
