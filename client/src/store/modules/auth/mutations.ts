import { MutationTypes } from "./mutation-types";
import { MutationTree } from "vuex";
import { AuthState } from "./state";

export type Mutations<S = AuthState> = {
  [MutationTypes.SET_USER](state: S, payload: AuthState): void;
  [MutationTypes.SET_DIDAUTOLOGOUT](state: S, payload: boolean): void;
};

export const mutations: MutationTree<AuthState> & Mutations = {
  [MutationTypes.SET_USER](state, { token, user, didAutoLogout }) {
    state.token = token;
    state.user = user;
    state.didAutoLogout = didAutoLogout;
  },
  [MutationTypes.SET_DIDAUTOLOGOUT](state) {
    state.didAutoLogout = true;
  },
};
