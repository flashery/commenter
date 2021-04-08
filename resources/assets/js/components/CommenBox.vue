<template>
	<div class="row comment-box">
		<form @submit.prevent="addComment">
			<div class="col-md-12">
				<h5>Reply</h5>
			</div>
			<div class="col-md-12">
				<input type="text" v-model="comment.username" />
			</div>
			<div class="col-md-12">
				<textarea type="text" v-model="comment.message" />
			</div>
			<div class="col-md-12">
				<input type="submit" value="Submit" />
			</div>
		</form>
	</div>
</template>
<script>
import axios from "axios";

export default {
	props: ["parent_comment"],
	data: () => {
		return {
			comment: {
				post_id: "",
				parent_comment_id: "",
				username: "",
				message: "",
			},
		};
	},
	mounted() {
		this.comment.post_id = this.parent_comment
			? this.parent_comment.post_id
			: 1;
		this.comment.parent_comment_id = this.parent_comment
			? this.parent_comment.id
			: 0;
	},
	methods: {
		async addComment() {
			const data = await axios.post("/comment", this.comment);
			if (data.status === 200) this.$emit("commentCreated");
			this.comment = {
				username: "",
				message: "",
			};
		},
	},
};
</script>
<style scoped>
.comment-box textarea {
	width: 300px;
}
.comment-box input {
	margin: 20px 0;
	width: 300px;
}
</style>