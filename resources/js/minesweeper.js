/** @namespace humhub */
humhub.module('minesweeper', (module, req, $) => {

  const event = req('event');
  const gamecenter = req('gamecenter').getInstance(module.id);

  /** @returns {void} */
  function init() {
    console.log('minesweeper module activated')
  }

  /**
   * @param {number} score
   * @param {number} player
   */
  function submitScore(score, player) {
    const data = {id: module.id, score, player};

    gamecenter.submitScore({data})
              .then((res) => {
                // Do something with the result
              })
              .catch((e) => {
                // Do something with the error
                module.log.error(e, undefined, true)
              })
  }

  module.export({init})
});
