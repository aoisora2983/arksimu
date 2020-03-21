<template>
  <div class="card-footer text-muted">
    <dl
      class="tag-box"
      v-for="(tag, tagType) in tags"
      :key="tagType"
    >
      <dt class="h5">{{ tagsName[tagType] }}</dt>
      <dd id="tag-type">
        <ul class="tag-detail-list">
          <li
            v-for="(tagDetail, index) in tag"
            :key="index"
            v-if="tagDetail != ''"
          >
            <input
              name="tag"
              type="checkbox"
              v-bind:id="[tagType + index]"
              v-bind:value="index"
              v-model="checkedTags[tagType]"
            />
            <label
              class="btn btn-secondary tag-detail"
              v-bind:for="[tagType + index]"
            >{{ tagDetail }}</label>
          </li>
        </ul>
      </dd>
    </dl>
  </div>
</template>

<script>
export default {
  name: "TagList",
  props: {
    tags: {},
    checkedTags: {},
    tagsName: {}
  },
  methods: {}
};
</script>

<style></style>
