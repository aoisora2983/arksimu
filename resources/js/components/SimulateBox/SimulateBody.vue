<template>
  <ul class="chara-list">
    <li
      class="chara-card"
      v-for="chara in charas"
      :key="chara.chara_id"
      :id="['chara-card' + chara.chara_id]"
      :class="[chara.rarity == 6 ? 'undisplay' : '', 'rarity' + chara.rarity]"
    >
      <div class="card">
        <img
          class="card-img-top"
          loading="lazy"
          v-bind:src="[chara.chara_img]"
          v-bind:alt="[chara.chara_name]"
        />
        <div class="card-body">
          <p class="card-title">{{ chara.chara_name }}</p>
          <p class="card-text">{{ chara.chara_rare }}</p>
          <p
            class="badge badge-secondary card-text"
            v-if="tags.rarity[chara.rarity] != ''"
            :id="'chara-rarity' + [chara.chara_id + chara.rarity]"
          >
            {{ tags.rarity[chara.rarity] }}
          </p>
          <p
            class="card-text"
            v-if="tags.rarity[chara.rarity] == ''"
            :id="'chara-rarity' + [chara.chara_id + chara.rarity]"
          >
            ★{{ chara.rarity }}
          </p>
          <p
            :id="'chara-distance' + [chara.chara_id + chara.distance]"
            v-if="tags.distance"
            class="badge badge-secondary card-text"
          >
            {{ tags.distance[chara.distance] }}
          </p>
          <p
            v-if="tags.job"
            :id="'chara-job' + [chara.chara_id + chara.job]"
            class="badge badge-secondary card-text"
          >
            {{ tags.job[chara.job] }}
          </p>
          <ul class="card-text chara-tags">
            <li
              class="chara-tag"
              v-for="other in chara.other"
              :key="other"
            >
              <span
                v-if="tags.other"
                class="badge badge-secondary other"
                :id="'chara-other' + [chara.chara_id + other]"
              >{{ tags.other[other] }}</span>
            </li>
          </ul>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: "SimulateBody",
  props: {
    charas: {},
    checkedTags: {},
    orFlg: Boolean,
    tags: {}
  },
  methods: {
    //全てのタグのactiveを削除
    initCharaTags: function() {
      let actives = document.getElementsByClassName("badge");
      [].forEach.call(actives, function(e) {
        e.classList.remove("active");
      });
    },
    //キャラ表示の初期化
    initCharaDisplay: function() {
      let charactors = document.getElementsByClassName("chara-card");
      [].forEach.call(charactors, function(e) {
        e.classList.remove("undisplay");
      });
      //★6だけ非表示
      let charactors6 = document.getElementsByClassName("rarity6");
      [].forEach.call(charactors6, function(e) {
        e.classList.add("undisplay");
      });
    },
    // タグが一つでもチェックされているか
    isChecked: function(tags) {
      for (let tagType in tags) {
        if (tags[tagType].length != 0) {
          return true;
        }
      }
      return false;
    },
    searchOr: function(chara, tagType) {
      let checkedtag = this.checkedTags[tagType];

      for (let tagIndex in checkedtag) {
        if (chara[tagType].includes(checkedtag[tagIndex])) {
          this.tagActive(
            "chara-" + tagType + chara["chara_id"] + checkedtag[tagIndex]
          );
          return true;
        }
      }
    },
    searchAnd: function(chara, tagType) {
      let checkedtag = this.checkedTags[tagType];

      for (let tagIndex in checkedtag) {
        if (chara[tagType].includes(checkedtag[tagIndex])) {
          this.tagActive(
            "chara-" + tagType + chara["chara_id"] + checkedtag[tagIndex]
          );
        }
        if (tagType == "other") {
          if (!chara[tagType].includes(checkedtag[tagIndex])) {
            return true;
          }
        } else {
          if (chara[tagType] != checkedtag[tagIndex]) {
            return true;
          }
        }
      }
      return false;
    },
    tagActive: function(id) {
      document.getElementById(id).classList.add("active");
    },
    searchCharas: function(tags, orFlg) {
      let charas = this.charas;
      // ★6は上級エリートのチェックが無い限り表示しない
      let dispRare6 = false;

      for (let charaNo in charas) {
        let charaDisp = !orFlg;

        for (let tagType in tags) {
          //上級エリートを含むか
          if (tagType == "rarity" && tags[tagType][0] == 6) {
            dispRare6 = true;
          }

          //OR
          if (orFlg && !charaDisp) {
            charaDisp = this.searchOr(charas[charaNo], tagType);
          } else if (orFlg && charaDisp) {
            this.searchOr(charas[charaNo], tagType);
          }

          //AND
          if (!orFlg) {
            let tmp = this.searchAnd(charas[charaNo], tagType);
            if (tmp) {
              charaDisp = false;
            }
          }
        }
        if (!charaDisp) {
          document
            .getElementById("chara-card" + charas[charaNo]["chara_id"])
            .classList.add("undisplay");
        } else if (charas[charaNo]["rarity"] != 6) {
          document
            .getElementById("chara-card" + charas[charaNo]["chara_id"])
            .classList.remove("undisplay");
        } else if (charas[charaNo]["rarity"] == 6 && dispRare6) {
          document
            .getElementById("chara-card" + charas[charaNo]["chara_id"])
            .classList.remove("undisplay");
        }
      }
    }
  },
  watch: {
    checkedTags: {
      handler: function(checkedTags) {
        this.initCharaTags();
        this.initCharaDisplay();
        if (this.isChecked(checkedTags)) {
          this.searchCharas(checkedTags, this.orFlg);
        }
      },
      deep: true
    },
    orFlg: function() {
      this.initCharaTags();
      this.initCharaDisplay();
      if (this.isChecked(this.checkedTags)) {
        this.searchCharas(this.checkedTags, this.orFlg);
      }
    }
  }
};
</script>

<style></style>
