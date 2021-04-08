<template>
	<div
		:style="{
			'margin-left': margin,
		}"
	>
		<div class="comment">
			<span class="date"><strong>Date:</strong> {{ comment.created_at }}</span>
			|
			<span class="user"
				><strong>Username: </strong> {{ comment.username }}</span
			>
			<h5><strong>Message:</strong></h5>
			<p class="message">{{ comment.message }}</p>
			<commen-box
				@commentCreated="commentCreated"
				:parent_comment="comment"
				v-if="layer < max_layer"
			/>
		</div>
	</div>
</template>
<script>
import CommenBox from "./CommenBox";
export default {
	components: { CommenBox },
	props: ["comment", "margin", "layer"],
	data() {
		return { max_layer: 3 };
	},
	methods: {
		commentCreated() {
			this.$emit("commentCreated");
		},
	},
};
</script>
<style  scoped>
.comment {
	border: 1px solid #ddd;
	padding: 20px;
	margin: 20px 0;
}
.comment .message {
	background: #fff;
	padding: 5px;
	border-radius: 10px;
}
</style>