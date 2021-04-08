<template>
	<div class="panel-footer">
		<div v-for="comment in comments" :key="comment.id">
			<comment
				@commentCreated="commentCreated"
				:layer="1"
				:comment="comment"
				:margin="0"
			/>
			<div v-for="ch1_comment in comment.children" :key="ch1_comment.id">
				<comment
					@commentCreated="commentCreated"
					:layer="2"
					:comment="ch1_comment"
					:margin="'20px'"
				/>
				<div v-for="ch2_comment in ch1_comment.children" :key="ch2_comment.id">
					<comment
						@commentCreated="commentCreated"
						:layer="3"
						:comment="ch2_comment"
						:margin="'40px'"
					/>
				</div>
			</div>
		</div>
		<div>
			<commen-box @commentCreated="commentCreated" :parent_comment="null" />
		</div>
	</div>
</template>
<script>
import Comment from "./Comment";
import CommenBox from "./CommenBox";
export default {
	props: ["comments"],
	components: { CommenBox, Comment },
	methods: {
		commentCreated() {
			this.$emit("commentCreated");
		},
	},
	mounted() {
		console.log(this.comments.length);
	},
};
</script>
<style scoped>
.comment {
	border: 1px solid #ccc;
	margin: 20px 0;
	padding: 20px;
}
</style>