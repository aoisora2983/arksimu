<template>
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        <div class="custom-control custom-switch">
          <input
            type="checkbox"
            class="custom-control-input"
            id="isOr"
            v-model="orFlg"
          >
          <label
            class="custom-control-label"
            for="isOr"
          >
            <span v-if="orFlg">or 検索</span>
            <span v-if="!orFlg">and検索</span>
          </label>
        </div>
      </div>
      <div class="card-body">
        <SimulateBody
          :charas="charas"
          :tags="tags"
          :checkedTags="checkedTags"
          :orFlg="orFlg"
        ></SimulateBody>
      </div>
      <TagList
        :tags="tags"
        :checkedTags="checkedTags"
        :tagsName="tagsName"
      ></TagList>
    </div>
  </div>
</template>

<script>
import SimulateBody from "./SimulateBox/SimulateBody";
import TagList from "./SimulateBox/TagList";

export default {
  name: "SimulatorComponent",
  components: {
    SimulateBody,
    TagList
  },
  data() {
    return {
      charas: {},
      tags: {},
      checkedTags: {
        rarity: [],
        distance: [],
        job: [],
        other: []
      },
      tagsName: {},
      orFlg: true
    };
  },
  methods: {
    fetchCharas: function() {
      axios.get("/api/getCharas").then(res => {
        this.charas = res.data;
      });
    },
    fetchTags: function() {
      axios.get("/api/getTags").then(res => {
        this.tags = res.data;
      });
    },
    fetchTagsName: function() {
      axios.get("/api/getTagsName").then(res => {
        this.tagsName = res.data;
      });
    }
  },
  created() {
    this.fetchCharas();
    this.fetchTags();
    this.fetchTagsName();
  }
};
</script>

<style></style>
